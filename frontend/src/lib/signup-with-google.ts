/**
 *
 * @param redirectAfterLogin Closure pour redirect après le login
 */
import firebase, { usersRef } from '../back/firebase.global';
import { UserEntity } from '../back/entity/user.entity';
import { UserService } from '../utils/user.service';
import { LocalStorageEnum } from '../enum/localstorage.enum';
import { ItemService } from '../back/item.service';

export function signinWithGoogle(redirectAfterLogin: Function) {

  const provider = new firebase.auth.GoogleAuthProvider();

  firebase.auth()
  .signInWithPopup(provider)
  .then(async ({ additionalUserInfo: { isNewUser }, credential: { accessToken: token }, user }: any) => {
    const userEntity = new UserEntity(
      user?.uid,
      user?.displayName,
      user?.color,
      user?.docList,
      user?.role);

    if(isNewUser) {
      ItemService.handleCreate(usersRef, LocalStorageEnum.USER_INFO, true, userEntity, undefined, async () => {
        await ItemService.syncData(usersRef, LocalStorageEnum.USER_INFO);
      });
    }
    UserService.loginUser(userEntity, token);
    // Redirect
    redirectAfterLogin();
  }).catch((error) => {
    // Handle Errors here
    console.error(error);
  });

}
