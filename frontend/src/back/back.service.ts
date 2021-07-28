import firebase from '../back/firebase.global';

/**
 * Class manageant le back (export en singleton par BackService )
 */
class Back {

  /**
   * Trouver tous les items d'une collection
   * @param ref référence du node firebase
   * @param callback sera exécuté après récupération des données
   */
  findAll(ref: firebase.database.Reference, callback: Function) {
    ref.on('value', async (snapshot: firebase.database.DataSnapshot) => {
      await callback(snapshot.val());
    });
  }

  /**
   * Trouver un item d'une collection
   * @param ref référence du node firebase
   * @param id id de la ressource visée
   * @param callback sera exécuté après récupération des données
   */
  async findOneById(ref: firebase.database.Reference, id: string, callback?: Function): Promise<any> {
    ref.orderByKey().equalTo(id).on('child_added', async (snapshot) => {
      if(callback) await callback(snapshot.val());
    });
    ref.orderByKey().equalTo(id).on('child_changed', async (snapshot) => {
      if(callback) await callback(snapshot.val());
    });
  }

  /**
   * Création d'un item dans une collection
   * @param ref référence du node firebase
   * @param item corps du item à créer
   * @param callback sera exécuté après récupération des données
   */
  create(ref: firebase.database.Reference, item: any, callback?: Function) {
    const res = ref.push(item);
    if(callback) callback(res);
    return res;
  }

  /**
   * Mise à jour d'un item dans une collection
   * @param ref référence du node firebase
   * @param id id de la ressource visée
   * @param item corps du document à créer
   * @param callback sera exécuté après récupération des données
   */
  update(ref: firebase.database.Reference, id: string, item: any, callback?: Function): Promise<any> {
    ref.child(id).update(item);
    return this.findOneById(ref, id, callback || undefined);
  }

  /**
   * Delete d'un item dans une collection
   * @param ref référence du node firebase
   * @param id id de la ressource visée
   * @param callback sera exécuté après récupération des données
   */
  delete(ref: firebase.database.Reference, id: any, callback?: Function) {
    const res = ref.child(id).remove();
    if(callback) callback(res);
    return res;
  }


}

class BackTestOpti {

  async getCallCenters() {
    const response = await fetch(
      'http://localhost:8741/call/center/normal',
      {
        method: 'GET',
        mode: 'cors',
        headers: {
          "Accept": '*/*',
          "Accept-Encoding" : 'gzip, deflate, br'
        }
      });
    return response.json()

  }

  async getInventory() {
    const response = await fetch(
      'http://localhost:8741/inventory/10000',
      {
        method: 'GET',
        mode: 'cors',
        headers: {
          "Accept": '*/*',
          "Accept-Encoding" : 'gzip, deflate, br'
        }
      });
    return response.json()
  }

}

export const BackService = new Back();
export const BackTestOptiService = new BackTestOpti();
