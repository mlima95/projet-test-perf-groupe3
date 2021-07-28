import { css, customElement, html, property } from 'lit-element';
import { BackService } from '../../back/back.service';
import { docsRef } from '../../back/firebase.global';
import './docs-card.element.js';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { GuardedLitElement } from '../guard-lit-element.abstract';
import { sleep } from '../../utils/sleep.utils';
import { DocumentEntity } from '../../back/entity/document.entity';
import { IDBService } from '../../back/idb.service';
import { LocalStorageEnum } from '../../enum/localstorage.enum';
import { ItemService } from '../../back/item.service';

@customElement('app-docs')
export class DocListElement extends GuardedLitElement {

  @property()
  docList: DocumentEntity[] = [];

  static get styles() {
    return [globalCSSCss, css``];
  }

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
          await ItemService.syncData(docsRef, LocalStorageEnum.DOCUMENT_INFO);
        } else {
          this.docList = await IDBService.getItems(LocalStorageEnum.DOCUMENT_INFO);
        }
      },
      // Callback à fire quand on est en ligne
      async () => {
        BackService.findAll(docsRef, async (results: any) => {
          await sleep(500);
          this.docList = [];
          if(results) {
            Object.entries(results).forEach(
              ([key, value]) => {
                this.docList.push(new DocumentEntity(key, results[key].title, results[key].content, results[key].createdDate, results[key].updatedDate, results[key].author, results[key].listEditors));
              });
            await ItemService.refreshIDB(docsRef, LocalStorageEnum.DOCUMENT_INFO, this.docList);
          }
          this.requestUpdate();
        });


      },
      // Callback à fire quand on passe hors ligne
      async () => {
        this.docList = await IDBService.getItems(LocalStorageEnum.DOCUMENT_INFO);
        this.requestUpdate();
      }
    );
  }


  render() {
    if(!this.docList.length) {
      return this.skeleton();
    }
    return html`
      <div class='w3-container w3-row-padding w3-margin'>
        ${Object.values(this.docList).map((doc) =>
          html`
            <app-docs-cards class='w3-quarter'
                            ._doc='${doc}'
            ></app-docs-cards>`
        )}
      </div>`;
  }

  /**
   * Skeleton du component
   * @private
   */
  // eslint-disable-next-line class-methods-use-this
  private skeleton() {
    return html`
      <div class='w3-container w3-row-padding w3-margin'>
        ${[null, null].map(() =>
          html`
            <app-docs-cards class='w3-quarter'
                            empty='empty'></app-docs-cards>`
        )}
      </div>`;
  }
}
