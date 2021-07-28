import { customElement, html, LitElement } from 'lit-element';

@customElement('not-found-view')
export class NotFoundElement extends LitElement {

  render() {
    return html`
      <div class='w3-row-padding'>
       Not found
      </div>`;
  }
}
