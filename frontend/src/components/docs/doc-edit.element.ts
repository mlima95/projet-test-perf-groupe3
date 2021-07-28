import { css, customElement, html, property, query } from 'lit-element';
import { AfterEnterObserver, Router, RouterLocation } from '@vaadin/router';
import { GuardedLitElement } from '../guard-lit-element.abstract';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { BackService } from '../../back/back.service';
import { docsRef } from '../../back/firebase.global';
import { DocumentEntity } from '../../back/entity/document.entity';
import { UrlPathEnum } from '../../enum/url-path.enum';
import '@tinymce/tinymce-webcomponent';
import { unsafeHTML } from 'lit-html/directives/unsafe-html';
import { ItemService } from '../../back/item.service';
import { LocalStorageEnum } from '../../enum/localstorage.enum';
import { IDBService } from '../../back/idb.service';
import { sleep } from '../../utils/sleep.utils';

@customElement('app-doc-edit')
export class DocEditElementElement extends GuardedLitElement implements AfterEnterObserver {

  @query('#editor')
  editorQuery: any;

  @property()
  doc: DocumentEntity | undefined;

  @property({ type: String }) urlParameter = '';

  router: Router = new Router();

  iconsRef: any = {};


  constructor() {
    super();
    this.iconsRef = {
      urlEditor: new URL('../../assets/css/editor.css', import.meta.url),
      bold: new URL('../../assets/image/icone/001-bold_text.svg', import.meta.url),
      italic: new URL('../../assets/image/icone/002-italics.svg', import.meta.url),
      bullet: new URL('../../assets/image/icone/017-bullets.svg', import.meta.url),
      numbering: new URL('../../assets/image/icone/004-numbering.svg', import.meta.url),
      alignRight: new URL('../../assets/image/icone/031-arrow.svg', import.meta.url),
      alignCenter: new URL('../../assets/image/icone/022-leading.svg', import.meta.url),
      alignJustify: new URL('../../assets/image/icone/028-arrow.svg', import.meta.url),
      underline: new URL('../../assets/image/icone/008-edit.svg', import.meta.url)
    };
  }


  static get styles() {
    return [globalCSSCss, css`
      img {
        width: 30px;
        cursor: pointer;
        margin: 5px;
      }
    `];
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
        }
      },
      async () => {
        await IDBService.setItem(LocalStorageEnum.DOCUMENT_INFO, this.doc);
      }
    );
  }

  /**
   * Hook avant l'affichage de la page
   * @param location
   */
  onAfterEnter(location: RouterLocation) {
    this.urlParameter = <string>location.params.id;
    BackService.findOneById(docsRef, this.urlParameter, async (res: any) => {
      this.doc = res;
      await this.requestUpdate();
      this.syncro();
    });


  }

  render() {
    return html`
      <link rel='stylesheet' href='${this.iconsRef.urlEditor.pathname}'>
      <div class='edit-content'>
        <img class='w3-image' src='${this.iconsRef.bold.pathname}'
             @click='${(e: any) => this.format('bold', e.target.value)}'>

        <img class='w3-image' src='${this.iconsRef.italic.pathname}'
             @click='${(e: any) => this.format('italic', e.target.value)}'>

        <img class='w3-image' src='${this.iconsRef.bullet.pathname}'
             @click='${(e: any) => this.format('insertunorderedlist', e.target.value)}'>

        <img class='w3-image' src='${this.iconsRef.numbering.pathname}'
             @click='${(e: any) => this.format('insertOrderedList', e.target.value)}'>

        <img class='w3-image' src='${this.iconsRef.alignJustify.pathname}'
             @click='${(e: any) => this.format('justifyLeft', e.target.value)}'>


        <img class='w3-image' src='${this.iconsRef.alignCenter.pathname}'
             @click='${(e: any) => this.format('justifyCenter', e.target.value)}'>

        <img class='w3-image' src='${this.iconsRef.alignRight.pathname}'
             @click='${(e: any) => this.format('justifyRight', e.target.value)}'>

        <img class='w3-image' src='${this.iconsRef.underline.pathname}'
             @click='${(e: any) => this.format('underline', e.target.value)}'>

        <input class='color-apply' type='color' @change='${(e: any) => this.chooseColor(e)}'
               id='myColor' />

        <select id='input-font' class='input' @change='${(e: any) => this.changeFont(e)}'>
          <option value='Arial'>Arial</option>
          <option value='Helvetica'>Helvetica</option>
          <option value='Times New Roman'>Times New Roman</option>
          <option value='Sans serif'>Sans serif</option>
          <option value='Courier New'>Courier New</option>
          <option value='Verdana'>Verdana</option>
          <option value='Georgia'>Georgia</option>
          <option value='Palatino'>Palatino</option>
          <option value='Garamond'>Garamond</option>
          <option value='Comic Sans MS'>Comic Sans MS</option>
          <option value='Arial Black'>Arial Black</option>
          <option value='Tahoma'>Tahoma</option>
          <option value='Comic Sans MS'>Comic Sans MS</option>
        </select>
        <select id='fontSize' onclick='changeSize()'>
          <option value='1'>1</option>
          <option value='2'>2</option>
          <option value='3'>3</option>
          <option value='4'>4</option>
          <option value='5'>5</option>
          <option value='6'>6</option>
          <option value='7'>7</option>
          <option value='8'>8</option>
        </select>

        <p class='loading' id='loading'>Saving document....</p>
        <div class='editor' contenteditable='true' id='editor' @input='${(e: any) => this.handleForm(e)}'>
          ${unsafeHTML(this.doc!.content)}
        </div>
      </div>


    `;
  }


  /**
   * Soumet le formulaire de création
   * @param e event du submit
   * @private
   */
  private handleForm(e: any) {
    this.doc!.content = e.target.innerHTML;
    e.preventDefault();
    // Vérifier le title
    if(!!this.doc?.title && this.doc?.title !== '') {
      ItemService.handleUpdate(docsRef, LocalStorageEnum.DOCUMENT_INFO, this.isOnline, this.doc);
    } else {
      // Problème
      alert('go home');
      Router.go(UrlPathEnum.PATH_DOCS_SHOW);
    }
  }

  /**
   * Format un texte avec la command donné
   * @param command
   * @param value
   * @deprecated utilse execCommand
   */
  format(command: any, value: any) {
    document.execCommand(command, false, value);
  }

  /**
   * change la font d'une selection
   * @param e
   * @deprecated utilse execCommand
   */
  changeFont(e: any) {
    document.execCommand('fontName', false, e.target.value);
  }

  /**
   * change la size d'une sélection
   * @param e
   * @deprecated utilse execCommand
   */
  changeSize(e: any) {
    document.execCommand('fontSize', false, e.target.value);
  }

  /**
   * change la couleur d'une sélection
   * @param e
   * @deprecated utilse execCommand
   */
  chooseColor(e: any) {
    document.execCommand('foreColor', false, e.target.value);
  }

}
