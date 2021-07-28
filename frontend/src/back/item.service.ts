import firebase from 'firebase';
import { IDBService } from './idb.service';
import { BackService } from './back.service';
import { LocalStorageEnum } from '../enum/localstorage.enum';

export class Item {
  private items: any[] = [];

  /**
   * Syncronise les données entre IDB et le Firebase
   * @param ref
   * @param key
   * @param callback
   */
  async syncData(ref: firebase.database.Reference, key: LocalStorageEnum, callback?: Function) {
    // Create
    const toCreate = await IDBService.getItemToCreate(key);
    if(toCreate.length) {
      for(const item of toCreate) {
        item.synced = 1;
        const result: any = BackService.create(ref, item, callback);
        if(result instanceof Error) {
          item.synced = 1;
        }
      }
    }

    // Update
    const toUpdate = await IDBService.getItemToUpdate(key);
    if(toUpdate.length) {
      for(const item of toUpdate) {
        item.synced = 1;
        item.updated = 0;
        const result: any = BackService.update(ref, item.id, item);
        if(result instanceof Error) {
          item.synced = 0;
          item.updated = 1;
        }
        await IDBService.setItem(key, item);
      }
    }

    // delete
    const toDelete = await IDBService.getItemToDelete(key);
    if(toDelete.length) {
      for(const item of toDelete) {
        item.synced = 1;
        item.deleted = 0;
        const result: any = BackService.delete(ref, item.id);
        if(result instanceof Error) {
          item.synced = 0;
          item.deleted = 1;
        }
        await IDBService.setItem(key, item);
      }
    }
    this.items = await IDBService.getItems(key);
  }


  /**
   * Gère la création d'un item selon la présence ou non de réseau
   * @param ref
   * @param key
   * @param isOnline
   * @param item
   * @param callbackIsOnline
   * @param callbackIsNotOnline
   */
  async handleCreate(ref: firebase.database.Reference, key: LocalStorageEnum, isOnline: boolean, item: any, callbackIsOnline?: Function, callbackIsNotOnline?: Function) {
    if(isOnline && navigator.onLine) {
      const createdItem = await BackService.create(ref, item, callbackIsOnline);
      await BackService.update(ref, createdItem.key || item.id, {...item, id: createdItem.key || item.id})
      await this.refreshIDB(ref, key);
    } else {
      item.synced = 0;
      this.items = await IDBService.setItem(key, item);
      if(callbackIsNotOnline) await callbackIsNotOnline(item);
    }

  }

  /**
   * Gère la maj d'un item selon la présence ou non de réseau
   * @param ref
   * @param key
   * @param isOnline
   * @param item
   * @param callback
   */
  async handleUpdate(ref: firebase.database.Reference, key: LocalStorageEnum, isOnline: boolean, item: any, callback?: Function) {
    await IDBService.setItem(key, item);
    if(isOnline && navigator.onLine) {
      const result = await BackService.update(ref, item.id, item, callback);
      if(!(result instanceof Error)) {
        await this.refreshIDB(ref, key);
        return this.items;
      }
    }
    if(item.synced === 1) item.updated = 1;
    this.items = await IDBService.setItem(key, item);
    return this.items;

  }

  /**
   * Gère la suppression d'un item selon la présence ou non de réseau
   * @param ref
   * @param key
   * @param isOnline
   * @param item
   * @param callback
   */
  async handleDelete(ref: firebase.database.Reference, key: LocalStorageEnum, isOnline: boolean, item: any, callback?: Function) {
    await IDBService.setItem(key, item);
    if(isOnline && navigator.onLine) {
      const result = await BackService.delete(ref, item.id, callback);
      if(!(result instanceof Error)) {
        await this.refreshIDB(ref, key);
        return this.items;
      }
    }
    if(item.synced === 1) item.deleted = 1;
    this.items = await IDBService.setItem(key, item);
    return this.items;
  }

  /**
   * Actualise la DB local avec les données de la db distante
   * @param ref
   * @param key
   * @param items
   */
  async refreshIDB(ref: firebase.database.Reference, key: LocalStorageEnum, items?: any) {
    if(items) {
      await IDBService.clearItems(key);
      await IDBService.setItems(key, items);
      this.items = items;
    } else {
      BackService.findAll(ref, async (res: any) => {
        await IDBService.clearItems(key);
        await IDBService.setItems(key, res);
        this.items = res;
      });
    }
  }
}

export const ItemService = new Item();
