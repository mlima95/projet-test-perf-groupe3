import { css, html, LitElement, state } from 'lit-element';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { UserService } from '../../utils/user.service';
import { UrlPathEnum } from '../../enum/url-path.enum';
import { goTo } from '../../utils/navigation.utils';
import { RoleUserEnum } from '../../enum/role-user.enum';
import { UserEntity } from '../../back/entity/user.entity';


export class NavbarElement extends LitElement {

  /**
   * User courant
   */
  @state({})
  user: UserEntity | undefined;

  /**
   * state du bouton burger
   * @protected
   */
  @state()
  protected _activeBurgerBtn = false;

  static get styles() {
    return [globalCSSCss, css``];
  }

  constructor() {
    super();
    this.user = UserService.userInfo;}

  render() {
    this.user = UserService.userInfo;
    return html`
      <div class='w3-bar w3-light-blue w3-padding w3-xlarge'>
        <a href='/' class='w3-bar-item w3-button w3-padding-16 w3-margin-right'>Doogle Goc</a>
        <div class='w3-dropdown-hover w3-hide-small'>
          <button class='w3-button w3-padding-16'>Documents</button>
          <div class='w3-dropdown-content w3-bar-block w3-card-4'>
            <a href='#' @click='${(e: any) => goTo(e, UrlPathEnum.PATH_DOCS_SHOW)}' class='w3-bar-item w3-button'>Voir
              Documents</a>
            ${
              UserService.isUserHaveRole(RoleUserEnum.ROLE_ADMIN) ?
                html` <a href='#' @click='${(e: any) => goTo(e, UrlPathEnum.PATH_DOC_CREATE)}'
                         class='w3-bar-item w3-button'>Créer
                  Documents</a>`
                : ''
            }

          </div>
        </div>
        ${
          UserService.isUserHaveRole(RoleUserEnum.ROLE_ADMIN) ?
            html`
              <button @click='${(e: any) => goTo(e, UrlPathEnum.PATH_USERS_SHOW)}'
                      class='w3-bar-item w3-button w3-padding-16 w3-hide-small'>Utilisateurs
              </button>
              <button @click='${(e: any) => goTo(e, UrlPathEnum.CALL_CENTER)}'
                      class='w3-bar-item w3-button w3-padding-16 w3-hide-small'>Call Center
              </button>
              <button @click='${(e: any) => goTo(e, UrlPathEnum.INVENTORY)}'
                      class='w3-bar-item w3-button w3-padding-16 w3-hide-small'>Inventory
              </button>

            `
            : ''
        }

        ${this.getLogLink('w3-right w3-hide-small')}
        <button class='w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium' @click='${this.toggle}'>&#9776;
        </button>
      </div>
      <div
        class='w3-bar-block w3-light-blue w3-large w3-hide w3-hide-large w3-hide-medium ${this._activeBurgerBtn ? 'w3-show' : ''}'>
        <div class='w3-dropdown-hover'>
          <button class='w3-button w3-light-blue w3-padding-16'>Documents</button>
          <div class='w3-dropdown-content w3-bar-block w3-card-4'>
            <a href='#' @click='${(e: any) => goTo(e, UrlPathEnum.PATH_DOCS_SHOW)}' class='w3-bar-item w3-button'>Voir
              Documents</a>
            ${
              UserService.isUserHaveRole(RoleUserEnum.ROLE_ADMIN) ?
                html`<a href='#' @click='${(e: any) => goTo(e, UrlPathEnum.PATH_DOC_CREATE)}'
                        class='w3-bar-item w3-button'>Créer
                  Documents</a>`
                : ''
            }

          </div>
        </div>

        ${
          UserService.isUserHaveRole(RoleUserEnum.ROLE_ADMIN) ?
            html`
              <button @click='${(e: any) => goTo(e, UrlPathEnum.PATH_USERS_SHOW)}'
                      class='w3-bar-item w3-button w3-padding-16'>Utilisateurs
              </button>
              <button @click='${(e: any) => goTo(e, UrlPathEnum.CALL_CENTER)}'
                      class='w3-bar-item w3-button w3-padding-16'>Call Center
              </button>
              <button @click='${(e: any) => goTo(e, UrlPathEnum.INVENTORY)}'
                      class='w3-bar-item w3-button w3-padding-16'>Inventory
              </button>
            `
            : ''
        }

        ${this.getLogLink()}
      </div>
    `;
  }

  /**
   * Togle du menu burger pour les petits view
   * @private
   */
  private toggle() {
    this._activeBurgerBtn = !this._activeBurgerBtn;
  }

  /**
   * Rend le bouton de déconnexion si l'user est connecté
   * @param className
   * @private
   */
  private getLogLink(className?: string) {
    // Recheck l'utilistateur
    if(this.user) {
      return html`
        <button @click='${() => this.disconnect()}'
                class='w3-bar-item w3-button w3-padding-16 ${className}'>Deconnexion
        </button>`;
    }
    this.requestUpdate();
  }

  /**
   * Déconnecte l'utilisateur
   * @private
   */
  private disconnect() {
    UserService.logoffUser();
    this.user = UserService.getUserInfo();
  }
}
