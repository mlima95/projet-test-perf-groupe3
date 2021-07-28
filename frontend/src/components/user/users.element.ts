import { GuardedLitElement } from '../guard-lit-element.abstract';
import { css, customElement, html, property } from 'lit-element';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { UserEntity } from '../../back/entity/user.entity';
import { usersRef } from '../../back/firebase.global';
import { sleep } from '../../utils/sleep.utils';
import { ItemService } from '../../back/item.service';
import { LocalStorageEnum } from '../../enum/localstorage.enum';
import { IDBService } from '../../back/idb.service';
import { BackService } from '../../back/back.service';

@customElement('app-users')
export class UsersElement extends GuardedLitElement {

  /**
   * Liste des users
   */
  @property()
  users: UserEntity[] = [];

  constructor() {
    super();
    this.syncro();
  }

  /**
   * Lancer les processus au 1er render
   */
  protected async syncro() {
    // Méthode du parent, avec les actions à effectuer par l'enfant
    await super.syncro(
      // Callback à fire quand la connectivité change
      async (isOnline: boolean) => {
        if(isOnline) {
          await ItemService.syncData(usersRef, LocalStorageEnum.USER_INFO);
        } else {
          this.users = await IDBService.getItems(LocalStorageEnum.USER_INFO);
        }
      },
      // Callback à fire quand on est en ligne
      () => {
        BackService.findAll(usersRef, async (results: any) => {
          await sleep(1000);
          this.users = [];
          if(results) {
            Object.entries(results).forEach(

              ([key, value]) => {
                this.users.push(new UserEntity(results[key].id, results[key].name, results[key].color, results[key].docList, results[key].role));
              });
            await IDBService.setItems(LocalStorageEnum.USER_INFO, this.users);
          }
          this.requestUpdate();
        });

      },
      // Callback à fire quand on passe hors ligne
      async () => {
        this.users = await IDBService.getItems(LocalStorageEnum.USER_INFO);
      }
    );


  }

  static get styles() {
    return [
      globalCSSCss,
      css`
        .avatar {
          /* Center the content */
          display: inline-block;
          vertical-align: middle;

          /* Used to position the content */
          position: relative;

          /* Colors */
          color: #FFF;

          /* Rounded border */
          border-radius: 50%;
          height: 48px;
          width: 48px;
        }

        .avatar__letters {
          /* Center the content */
          left: 50%;
          position: absolute;
          top: 50%;
          transform: translate(-50%, -50%);
        }
      `];
  }

  render() {
    if(!this.users.length) {
      return this.skeleton();
    }
    return html`
      <ul class='w3-section w3-ul'>
        ${this.users.map((user) =>
          html`
            <li class='w3-bar w3-animate-left'>
              <div class='avatar w3-left w3-hide-small' style='background: ${user.color}80'>
                <div class='avatar__letters'>
                  ${user.name.charAt(0).toLocaleUpperCase()}
                </div>
              </div>
              <div class='w3-bar-item'>
                <span class='w3-xlarge w3-left'>${user.name}</span><br>
              </div>
              <div class='w3-right'>
                ${user.role?.map((r) => html`<span class='w3-tag w3-blue w3-round-large w3-margin-left'>${r}</span>`)}
              </div>
            </li>`
        )}
      </ul>
    `;
  }

  private skeleton() {
    return html`
      <ul class='w3-section w3-ul'>
        <li class='w3-bar w3-light-grey w3-animate-left'>
          <div class='avatar w3-left w3-hide-small' style='background: #00000080'>
            <div class='avatar__letters'>
              0
            </div>
          </div>
          <div class='w3-bar-item'>
            <span class='w3-xlarge w3-left w3-grey' style='width:250px; height: 30px'></span><br>
          </div>
          <div class='w3-right'>
            <span class='w3-tag w3-blue w3-round-large w3-margin-left w3-grey' style='width:100px; height: 20px'></span>
          </div>
        </li>
      </ul>
    `;
  }
}
