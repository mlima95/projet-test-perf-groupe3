import { openDB } from 'idb';
import { LocalStorageEnum } from '../enum/localstorage.enum';

/**
 * Gère la communication avec IndexedDB, exporté en singleton par IDBService
 */
class Idb {

  /**
   * Initialise l'IndexedDB
   */
  async initDB() {
    return openDB('doogle-goc', 1, {
      upgrade(database) {
        // Create a store of objects
        const userStore = database.createObjectStore(LocalStorageEnum.USER_INFO, {
          // The 'id' property of the object will be the key.
          keyPath: 'id'
        });
        // Create an index on the 'date' property of the objects.
        userStore.createIndex('id', 'id');
        userStore.createIndex('name', 'name');
        userStore.createIndex('color', 'color');
        userStore.createIndex('docList', 'docList');
        userStore.createIndex('role', 'role');
        userStore.createIndex('synced', 'synced');
        userStore.createIndex('updated', 'updated');
        userStore.createIndex('deleted', 'deleted');
        userStore.createIndex('done', 'done');
        userStore.createIndex('date', 'date');

        const documentStore = database.createObjectStore(LocalStorageEnum.DOCUMENT_INFO, {
          // The 'id' property of the object will be the key.
          keyPath: 'id'
        });
        // Create an index on the 'date' property of the objects.
        documentStore.createIndex('title', 'title');
        documentStore.createIndex('content', 'content');
        documentStore.createIndex('createdDate', 'createdDate');
        documentStore.createIndex('updatedDate', 'updatedDate');
        documentStore.createIndex('author', 'author');
        documentStore.createIndex('listEditors', 'listEditors');
        documentStore.createIndex('synced', 'synced');
        documentStore.createIndex('updated', 'updated');
        documentStore.createIndex('deleted', 'deleted');
        documentStore.createIndex('done', 'done');
        documentStore.createIndex('date', 'date');
      }
    });
  }

  /**
   * Mise en place d'items
   * @param storeName
   * @param data
   */
  async setItems(storeName: LocalStorageEnum, data: any) {
    const db = await this.initDB();
    const tx = db.transaction(storeName, 'readwrite');
    const result = typeof data === 'object' ? Object.entries(data).map(e => Object.assign(e[1], { key: e[0] })) : data;
    result.forEach((item: any) => {
      tx.store.put(item);
    });
    await tx.done;
    return db.getAllFromIndex(storeName, 'deleted', 0);
  }

  /**
   * Setter d'un item
   * @param storeName
   * @param data
   */
  async setItem(storeName: string, data: any) {
    const db = await this.initDB();
    const tx = db.transaction(storeName, 'readwrite');
    await tx.store.put(data);
    return db.getAllFromIndex(storeName, 'deleted', 0);
  }

  /**
   * Getter d'items
   * @param storeName
   */
  async getItems(storeName: LocalStorageEnum) {
    const db = await this.initDB();
    return db.getAllFromIndex(storeName, 'deleted', 0);
  }

  /**
   * Getter d'un item
   * @param storeName
   * @param id
   */
  async getItem(storeName: LocalStorageEnum, id: string) {
    const db = await this.initDB();
    return db.getFromIndex(storeName, 'id', id);
  }

  /**
   * Unsetter d'item
   * @param storeName
   * @param id
   */
  async unsetItem(storeName: LocalStorageEnum, id: string) {
    const db = await this.initDB();
    await db.delete(storeName, id);
    return db.getAllFromIndex(storeName, 'deleted', 0);
  }

  /**
   * Récupére les items à créer
   * @param storeName
   */
  async getItemToCreate(storeName: LocalStorageEnum) {
    const db = await this.initDB();
    return (await db.getAllFromIndex(storeName, 'synced', 0))
    .filter(item => item.deleted === 0 && item.updated === 0);
  }

  /**
   * Récupére les items à mettre à jour
   * @param storeName
   */
  async getItemToUpdate(storeName: LocalStorageEnum) {
    const db = await this.initDB();
    return (await db.getAllFromIndex(storeName, 'synced', 1))
    .filter(item => item.deleted === 0 && item.updated === 1);
  }

  /**
   * Récupére les items à delete
   * @param storeName
   */
  async getItemToDelete(storeName: LocalStorageEnum) {
    const db = await this.initDB();
    return (await db.getAllFromIndex(storeName, 'synced', 1))
    .filter(item => item.deleted === 1 && item.updated === 0);
  }

  /**
   * Clear un index de la base
   * @param key
   */
  async clearItems(key: LocalStorageEnum) {
    const db = await this.initDB();
    await db.clear(key);
  }

}


export const IDBService = new Idb();
