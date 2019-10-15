import App from './app.svelte';

export class Quotes {
  constructor(defaultElement = '.js-block-random-quotes') {
    this.defaultElement = document.querySelector(defaultElement);
  }

  init() {
    const {
      quotesNumber,
      interval,
    } = this.defaultElement.dataset;

    const app = new App({
      target: this.defaultElement,
      props: {
        number: quotesNumber,
        interval,
      },
    });
  }
}
