import { css, customElement, html } from 'lit-element';
import { GuardedLitElement } from '../guard-lit-element.abstract';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { DocumentEntity } from '../../back/entity/document.entity';
import { UserService } from '../../utils/user.service';
import { LocalStorageEnum } from '../../enum/localstorage.enum';
import { ItemService } from '../../back/item.service';
import { Router } from '@vaadin/router';
import { UrlPathEnum } from '../../enum/url-path.enum';
import { docsRef } from '../../back/firebase.global';


@customElement('app-doc-create')
export class DocCreateElement extends GuardedLitElement {

  inputName: string = '';

  static get styles() {
    return [globalCSSCss, css``];
  }

  constructor() {
    super();
    this.syncro();
  }

  /**
   * Détails de la syncronisation de l'élement
   */
  async syncro() {
    await super.syncro();
  }

  render() {
    return html`
      <div class='w3-card-4'>
        <div class='w3-container w3-blue'>
          <h2>Créer un nouveau document</h2>
        </div>
        <form class='w3-container w3-section' @submit='${this.handleForm}'>
          <label class='w3-tag w3-large w3-left w3-margin-bottom w3-round-xlarge w3-blue-grey'>Titre du
            document</label>
          <input placeholder='Nommer le document' class='w3-input' type='text'
                 .value='${this.inputName}'
                 @input='${(e: any) => {
                   this.inputName = e.target.value;
                 }}'>
          <button class='w3-button w3-section w3-indigo' type='submit'>Créer & aller à la liste des documents</button>
        </form>
      </div>
    `;
  }

  /**
   * Soumet le formulaire de création
   * @param e event du submit
   * @private
   */
  private async handleForm(e: any) {
    // Arret de l'event par défault
    e.preventDefault();

    // Vérifier le title
    if(!!this.inputName && this.inputName !== '') {

      // Title ok on créer le doc
      const doc: DocumentEntity = new DocumentEntity(undefined, this.inputName, undefined, undefined, undefined, UserService.getUserInfo());

      await ItemService.handleCreate(docsRef, LocalStorageEnum.DOCUMENT_INFO, this.isOnline, doc);
      Router.go(UrlPathEnum.PATH_DOCS_SHOW);

    } else {
      // Problème
      alert('Champs vide');
    }
  }
}
