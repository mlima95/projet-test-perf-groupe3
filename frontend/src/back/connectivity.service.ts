/**
 * Gère la connectivité
 */
export class Connectivity {
  private image = new Image();

  private tStart: number | null = null;

  private tEnd: number | null = null;

  private abortFallback = false;

  private counter: number = 0;

  private arrTimes: number[] = [];

  private state: Boolean = false;

  /**
   * Vérifie la connectivité de l'app
   * @param url
   * @param timeToCount
   * @param threshold
   * @param interval
   */
  checkConnectivity({
                      url = 'http://localhost:9999',
                      timeToCount = 2,
                      threshold = 2000,
                      interval = 10000
                    } = {}) {
    if(navigator.onLine) {
      this.changeConnectivity(true);
    } else {
      this.timeoutFallback(threshold);
    }

    window.addEventListener('online', () => {
        if(!this.state) {
          this.changeConnectivity(true);
        }
      }
    );
    window.addEventListener('offline', () =>
      this.timeoutFallback(threshold)
    );

    this.timeoutFallback(threshold);
    this.checkLatency(url, timeToCount, (avg: number) => this.handleResult(avg, threshold));
    setInterval(async () => {
      this.reset();
      this.timeoutFallback(threshold);
      this.checkLatency(url, timeToCount, (avg: number) => this.handleResult(avg, threshold));
    }, interval);
  }

  /**
   * Reset des variables qui jugent de la connectivité de l'app
   */
  reset() {
    this.arrTimes = [];
    this.counter = 0;
    this.abortFallback = false;
  }

  /**
   * Statue sur la connectivité
   * @param avg
   * @param threshold
   */
  handleResult(avg: number, threshold: number) {
    const isConnnectionFast = avg <= threshold;
    this.changeConnectivity(isConnnectionFast);
  }

  /**
   * Vérifie s'il y a de la latence
   * @param url
   * @param timeToCount
   * @param cb
   */
  checkLatency(url: string, timeToCount: number, cb: Function) {
    this.tStart = Date.now();
    if(this.counter < timeToCount) {
      this.image.src = `${url}?t=${this.tStart}`;
      this.image.onload = () => {
        this.abortFallback = true;
        this.tEnd = Date.now();
        const time = this.tEnd - (this.tStart ? this.tStart : 0);
        this.arrTimes.push(time);
        this.counter += this.counter;
        this.checkLatency(url, timeToCount, cb);
      };
    } else {
      const sum = this.arrTimes.reduce((a, b) => a + b);
      const avg = sum / this.arrTimes.length;
      cb(avg);
    }
  }

  /**
   * Change le statue de la connectivité
   * @param state
   */
  changeConnectivity(state: boolean) {
    if(this.state !== state) {
      this.state = state;
      const event = new CustomEvent('connection-changed', {
        detail: state
      });
      document.dispatchEvent(event);
    }
  }

  /**
   * Détermine quand le connectivité doit être changé
   * @param threshold
   */
  timeoutFallback(threshold: number) {
    setTimeout(() => {
      if(!this.abortFallback) {
        console.log('Connectivity is too slow, falling back to offline mode :(');
        this.changeConnectivity(false);
      }
    }, threshold + 1);
  }
}

export const ConnectivityService = new Connectivity();
