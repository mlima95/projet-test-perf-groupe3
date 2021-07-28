import { NodeNameEnum } from '../enum/node-name.enum';
import firebase from 'firebase';

const firebaseConfig = {
  apiKey: 'AIzaSyDQJCtiVg9K9dgY6Au_QfAxBhRjnBwr7ps',
  authDomain: 'doogle-goc.firebaseapp.com',
  databaseURL: 'https://doogle-goc-default-rtdb.europe-west1.firebasedatabase.app',
  projectId: 'doogle-goc',
  storageBucket: 'doogle-goc.appspot.com',
  messagingSenderId: '729117773896',
  appId: '1:729117773896:web:528487a06b57e21e24c87d',
  measurementId: 'G-ZXNM0M53KF'
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

const databaseRef = firebase.database().ref();
export const usersRef = databaseRef.child(NodeNameEnum.NODE_USERS_NAME);
export const docsRef = databaseRef.child(NodeNameEnum.NODE_DOCS_NAME);
export default firebase;
