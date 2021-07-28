import { css, customElement, html, property } from 'lit-element';
import { GuardedLitElement } from '../guard-lit-element.abstract';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { BackTestOptiService } from '../../back/back.service';

@customElement('app-inventory')
export class InventoryElement extends GuardedLitElement {

  @property() inventoryList: any;
  spinnerImg: any;


  static get styles() {
    return [globalCSSCss, css``]
  }

  constructor() {
    super();
    this.spinnerImg = new URL('../../assets/image/icone/Spinner-1s-200px.svg', import.meta.url)
    this.getInventories();

  }

  private async getInventories() {
    this.inventoryList = (await BackTestOptiService.getInventory()).ENTITY;
    console.log(this.inventoryList);
    this.requestUpdate()
  }


  render() {
    if(this.inventoryList?.length) {
      return html`
        <div class='w3-content w3-section'>
        <button class='w3-btn w3-center w3-xlarge w3-red w3-margin' @click='${() => setInterval(() => this.shuffle(), 1500)
        }'>Shuffle !</button>
        <ul class='w3-ul w3-card-4 w3-section'>
          ${this.inventoryList.map((inv: any) => html`<li style='background: ${this.getRandomColor()}'>${inv.InvDateSk}</li>`)}
        </ul>
        </div>
      `;

    }
    return html`
      <img src='${this.spinnerImg.pathname}' alt='spinner' class='w3-center w3-image' />
      <p>Pas encore d'inventory...</p>
    `;
  }

  private getRandomColor() {
    return `#${(Math.random() * 0xfffff * 1000000).toString(16).slice(0, 6)}`;
  }

  public shuffle() {
    for (let i = this.inventoryList.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [this.inventoryList[i], this.inventoryList[j]] = [this.inventoryList[j], this.inventoryList[i]];
    }
    this.requestUpdate();
  }
}
