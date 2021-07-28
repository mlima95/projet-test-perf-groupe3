import { css, customElement, html, property } from 'lit-element';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { GuardedLitElement } from '../guard-lit-element.abstract';
import { BackTestOptiService } from '../../back/back.service';

@customElement('app-call-center')
export class CallcentersElement extends GuardedLitElement {

  @property()
  callCenterList: any;

  spinnerImg: any;

  constructor() {
    super();
    this.spinnerImg = new URL('../../assets/image/icone/Spinner-1s-200px.svg', import.meta.url);
    this.getCallCenters();
  }

  static get styles() {
    return [globalCSSCss, css``];
  }

  protected async getCallCenters() {
    this.callCenterList = (await BackTestOptiService.getCallCenters()).ENTITY;
    console.log(this.callCenterList);
    this.requestUpdate();
  }

  render() {
    if(this.callCenterList?.length) {
      return html`
        <ul class='w3-ul w3-card-4 w3-section'>
          ${this.callCenterList.map((cc: any) => html`
            <li>${cc.ccCallCenterSk} ===> ${cc.ccCallCenterId}</li>`
          )}
        </ul>
      `;
    }

    return html`
      <img src='${this.spinnerImg.pathname}' alt='spinner' class='w3-center w3-image' />
      <p>Pas encore de call centers...</p>
    `;
  }
}
