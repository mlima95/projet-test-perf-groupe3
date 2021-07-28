import { DocumentEntity } from './document.entity';
import { uuidGenerator } from '../../utils/uuid.generator';
import { RoleUserEnum } from '../../enum/role-user.enum';
import { BaseEntity } from './base.entity';

/**
 * Représente un document dans la base
 */
export class UserEntity extends BaseEntity {

  constructor(
    public id: string,
    public name: string,
    public color?: string,
    public docList?: Array<DocumentEntity>,
    public role?: Array<RoleUserEnum>
  ) {
    super()
    // Mettre une couleur aléatoire
    this.color = color || `#${(Math.random() * 0xfffff * 1000000).toString(16).slice(0, 6)}`;
    this.id = id || uuidGenerator();
    this.color = color || '';
    this.docList = docList || [];
    this.name = name || '';
    this.role = role || [RoleUserEnum.ROLE_ADMIN];
  }

}
