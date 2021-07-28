import { Router } from '@vaadin/router';
import { UrlPathEnum } from './enum/url-path.enum';
import { NavbarElement } from './components/ui/navbar.element';


export const router = new Router(document.querySelector('#outlet'));
customElements.define('app-navbar', NavbarElement);


/**************************
 *         ROUTAGE        *
 *************************/

function initRouter() {

  router.setRoutes([
    {
      path: UrlPathEnum.PATH_HOME,
      redirect: UrlPathEnum.PATH_DOCS_SHOW
    },
    {
      path: UrlPathEnum.PATH_LOGIN,
      component: 'app-login',
      action: async () => {
        await import('./components/user/login.element');
      }
    },
    {
      path: UrlPathEnum.PATH_DOCS_SHOW,
      component: 'app-docs',
      action: async () => {
        await import('./components/docs/docs.element');
      }
    },
    {
      path: UrlPathEnum.PATH_DOC_CREATE,
      component: 'app-doc-create',
      action: async () => {
        await import('./components/docs/doc-create.element');
      }
    },
    {
      path: UrlPathEnum.PATH_DOC_EDIT,
      component: 'app-doc-edit',
      action: async () => {
        await import('./components/docs/doc-edit.element');
      }
    },
    {
      path: UrlPathEnum.PATH_USERS_SHOW,
      component: 'app-users',
      action: async () => {
        await import('./components/user/users.element');
      }
    },
    {
      path: UrlPathEnum.CALL_CENTER,
      component: 'app-call-center',
      action: async () => {
        await import('./components/testopti/callcenters.element');
      }
    },
    {
      path: UrlPathEnum.INVENTORY,
      component: 'app-inventory',
      action: async () => {
        await import('./components/testopti/inventory.element');
      }
    },
    {
      path: UrlPathEnum.PATH_404,
      component: 'not-found-view',
      action: async () => {
        await import('./components/not-found.element');
      }
    }


  ]);
}

async function registerSW() {
  if ('serviceWorker' in navigator) {
    try {
      console.log("Trying to register the service worker....");
      await navigator.serviceWorker.register('./src/sw.js');
      console.log("Registration complete...");

    } catch (e) {
      console.log('ServiceWorker registration failed. Sorry about that.', e);
    }
  } else {
    console.log('Your browser does not support ServiceWorker.');
  }
}

window.addEventListener('load', () => {
  initRouter();
  registerSW();
});
