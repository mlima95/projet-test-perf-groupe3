/**
 * Permet d'attendre le nbr de seconde voulu
 * @param time
 */
export const sleep = (time: number) => {
  return new Promise(resolve => setTimeout(resolve, time))
}
