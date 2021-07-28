import { LocalStorageEnum } from '../enum/localstorage.enum';
import { UserEntity } from '../back/entity/user.entity';
import { Router } from '@vaadin/router';
import { UrlPathEnum } from '../enum/url-path.enum';
import { RoleUserEnum } from '../enum/role-user.enum';

class UserClass {

  /**
   * Vérifie si l'utilisateur est connecté
   * @deprecated Vérification basique, à ne pas faire en prod, bien sûr
   */
  public isUserConnected(): boolean {
    return !!localStorage.getItem(LocalStorageEnum.USER_TOKEN) && !!localStorage.getItem(LocalStorageEnum.USER_INFO);
  }

  /**
   * Récupère les info de l'user local
   */
  getUserInfo(): UserEntity | undefined {
    const u = JSON.parse(<string>localStorage.getItem(LocalStorageEnum.USER_INFO));
    if (u) return u as UserEntity;
    return undefined;
  }

  get userInfo() : UserEntity | undefined{
    return this.getUserInfo()
  }


  /**
   * Déconnecte l'user
   */
  logoffUser() {
    localStorage.removeItem(LocalStorageEnum.USER_INFO);
    localStorage.removeItem(LocalStorageEnum.USER_TOKEN);
    Router.go(UrlPathEnum.PATH_LOGIN);
  }

  /**
   * Log l'user
   * @param info
   * @param token
   */
  loginUser(info: UserEntity, token: string) {
    localStorage.setItem(LocalStorageEnum.USER_INFO, JSON.stringify(info));
    localStorage.setItem(LocalStorageEnum.USER_TOKEN, token);
    location.reload()
  }

  /**
   * Détermine les rôles de l'user
   * @param role
   */
  isUserHaveRole(role: RoleUserEnum){
    const u = this.getUserInfo();
    if(u){
      return u.role?.includes(role);
    } else {
      return false;
    }
  }
}


export const UserService = new UserClass();
