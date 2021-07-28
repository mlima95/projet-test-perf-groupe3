import { UrlPathEnum } from '../enum/url-path.enum';
import { Router } from '@vaadin/router';

/**
 * Permet de se déplacer en utilisant le router
 * @param event
 * @param path
 * @param callback
 */
export function goTo(event: any, path: UrlPathEnum, callback?: Function){
  event.preventDefault();
  Router.go(path);
  if(callback) callback();
}
