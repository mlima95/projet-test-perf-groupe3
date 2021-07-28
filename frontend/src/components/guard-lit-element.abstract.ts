import { Router, BeforeEnterObserver, PreventAndRedirectCommands, RouterLocation } from '@vaadin/router';
import { UserService } from '../utils/user.service';
import { UrlPathEnum } from '../enum/url-path.enum';
import { LitElement } from 'lit-element';
import { ConnectivityService } from '../back/connectivity.service';

/**
 * Guard qui statue si l'user doit se connecter au non pour accéder au component
 */
export abstract class GuardedLitElement extends LitElement implements BeforeEnterObserver {


  protected isOnline: boolean = true;

  /**
   * Vérifie si l'user doit être connecter ou non, redirige vers le login s'il n'est pas connecté
   * @param location
   * @param commands
   * @param router
   */
  onBeforeEnter(location: RouterLocation, commands: PreventAndRedirectCommands, router: Router) {
    if(!UserService.isUserConnected()) {
      return commands.redirect(UrlPathEnum.PATH_LOGIN);
    }
  }

  /**
   * Lancer les processus de syncro
   */
  protected async syncro(callbackEventConnectivity?: Function, callbackIfOnline?: Function, callbackIfNotOnline?: Function) {
    ConnectivityService.checkConnectivity();
    document.addEventListener('connection-changed',  async (ev) => {
      this.isOnline = ev instanceof CustomEvent ? ev.detail : undefined ;
      if(callbackEventConnectivity) await callbackEventConnectivity(this.isOnline);
    });
    if(this.isOnline && navigator.onLine) {
      if(callbackIfOnline) await callbackIfOnline();
    } else {
      if(callbackIfNotOnline) await callbackIfNotOnline();
    }
  }
}
