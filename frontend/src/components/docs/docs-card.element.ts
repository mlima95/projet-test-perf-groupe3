import { css, customElement, html, property } from 'lit-element';
import { docsRef } from '../../back/firebase.global';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { GuardedLitElement } from '../guard-lit-element.abstract';
import { LocalStorageEnum } from '../../enum/localstorage.enum';
import { DocumentEntity } from '../../back/entity/document.entity';
import { ItemService } from '../../back/item.service';

@customElement('app-docs-cards')
export class DocCardElement extends GuardedLitElement {

  @property() _doc: DocumentEntity | undefined;

  @property({ type: String })
  empty: String = '';

  private img = new URL('../../assets/image/icone/file-alt-solid.svg', import.meta.url);

  static get styles() {
    return [
      globalCSSCss,
      css``];
  }

  render() {
    if(this.empty === 'empty') {
      return this.skeleton();
    }
    return html`
      <div class='w3-container w3-padding-large w3-row w3-margin w3-center w3-pale-blue w3-animate-left'>
        <div style="cursor: pointer;" onclick="window.location='/doc/edit/${this.doc.id}';">
          <img src='${this.img.pathname}' alt='preview' class='w3-hover-opacity w3-center w3-image'>
          <p>${this.doc.title}</p>
        </div>
        <button class='w3-button w3-red' @click='${this.delete}'>Supprimer</button>
      </div>`;
  }

  /**
   * Skeleton du component
   * @private
   */
  private skeleton() {
    return html`
      <div class='w3-container w3-opacity w3-padding-large w3-row w3-margin w3-center w3-grey w3-animate-left'>
        <img src='${this.img.pathname}' alt='preview' class='w3-grayscale-max w3-center w3-image'>
        <p class='w3-margin-top ' style='height:25px; width: 60%; background: #f9f9f9'></p>
        <button class='w3-button w3-light-grey' style='height:25px; width: 80%; background: #f9f9f9' disabled>
        </button>
      </div>`;
  }


  /**
   * Suppression d'un doc
   * @private
   */
  private delete() {
    ItemService.handleDelete(docsRef, LocalStorageEnum.DOCUMENT_INFO, this.isOnline, this.doc, async () => {
      await this.requestUpdate();
    })
  }


  get doc(): DocumentEntity  {
    return this._doc!;
  }

  set doc(value: DocumentEntity | undefined) {
    this._doc = value;
  }
}
