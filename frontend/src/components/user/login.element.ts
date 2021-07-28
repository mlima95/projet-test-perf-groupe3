import { LitElement, html, css, customElement } from 'lit-element';
import { Router, BeforeEnterObserver, PreventAndRedirectCommands, RouterLocation } from '@vaadin/router';
import { signinWithGoogle } from '../../lib/signup-with-google';
import { globalCSSCss } from '../../utils/globalCSS.css';
import { UserService } from '../../utils/user.service';
import { UrlPathEnum } from '../../enum/url-path.enum';


/**
 * Component pour le login
 */
@customElement('app-login')
export class LoginElement extends LitElement implements BeforeEnterObserver {

  /**
   * Vérifier si on est pas déjà connecter avant d'afficher le component
   * @param location
   * @param commands
   * @param router
   */
  onBeforeEnter(location: RouterLocation, commands: PreventAndRedirectCommands, router: Router) {
    if(UserService.isUserConnected()){
      return commands.redirect(UrlPathEnum.PATH_DOCS_SHOW);
    }
  }

  static get styles() {
    return [
      globalCSSCss,
      css`*, *:before, *:after {
        box-sizing: border-box;
      }

        .g-sign-in-button {
          margin: 10px;
          display: inline-block;
          width: 240px;
          height: 50px;
          background-color: #4285f4;
          color: #fff;
          border-radius: 1px;
          box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.25);
          transition: background-color .218s, border-color .218s, box-shadow .218s;
        }

        .g-sign-in-button:hover {
          cursor: pointer;
          -webkit-box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
          box-shadow: 0 0 3px 3px rgba(66, 133, 244, 0.3);
        }

        .g-sign-in-button:active {
          background-color: #3367D6;
          transition: background-color 0.2s;
        }

        .g-sign-in-button .content-wrapper {
          height: 100%;
          width: 100%;
          border: 1px solid transparent;
        }

        .g-sign-in-button img {
          width: 18px;
          height: 18px;
        }

        .g-sign-in-button .logo-wrapper {
          padding: 15px;
          background: #fff;
          width: 48px;
          height: 100%;
          border-radius: 1px;
          display: inline-block;
        }

        .g-sign-in-button .text-container {
          font-family: Roboto, arial, sans-serif;
          font-weight: 500;
          letter-spacing: .21px;
          font-size: 16px;
          line-height: 48px;
          vertical-align: top;
          border: none;
          display: inline-block;
          text-align: center;
          width: 180px;
        }
      `];
  }


  static get properties() {
    return {};
  }

  render() {
    return html`
      <div class='g-sign-in-button' @click='${this.login}'>
        <div class='content-wrapper'>
          <div class='logo-wrapper'>
            <img src='https://developers.google.com/identity/images/g-logo.png' alt='image'>
          </div>
          <span class='text-container'><span>Connexion avec google</span></span>
        </div>
      </div>
    `;

  }

  login() {
    // Callback pour l'après login
    const redirectAfterLogin = () => {
      Router.go('docs');
    };
    signinWithGoogle(redirectAfterLogin);
  }
}
