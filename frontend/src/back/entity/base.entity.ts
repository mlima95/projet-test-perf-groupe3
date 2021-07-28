/**
 * Entité de base, que toute les autres extends
 */
export abstract class BaseEntity {

  public synced: number = 1;

  public updated: number = 0;

  public deleted: number = 0;

}
