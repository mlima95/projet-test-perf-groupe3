import { UserEntity } from './user.entity';
import { LocalStorageEnum } from '../../enum/localstorage.enum';
import { uuidGenerator } from '../../utils/uuid.generator';
import { BaseEntity } from './base.entity';

/**
 * Représente un document dans la base
 */
export class DocumentEntity extends BaseEntity {

  constructor(
    public id?: string,
    public title?: string,
    public content?: string,
    public createdDate?: Date,
    public updatedDate?: Date,
    public author?: UserEntity,
    public listEditors?: Array<UserEntity>) {

    super()
    // Gestion des dates
    this.createdDate = createdDate || new Date();
    this.updatedDate = new Date();

    this.id = id || uuidGenerator();

    this.title = title || '';
    this.content = content || '';
    this.listEditors = listEditors || [];

    // Récupération de l'user à stocker
    this.author = JSON.parse(<string>localStorage.getItem(LocalStorageEnum.USER_INFO)) as UserEntity;

  }

}
