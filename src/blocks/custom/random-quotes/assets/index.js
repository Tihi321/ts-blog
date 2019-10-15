import { domReady } from '../../../assets/scripts/utils/dom';

domReady(() => {

  // -------------------------------------------------------------
  // Random quotes
  if (document.querySelector('.js-block-random-quotes')) {
    import('./quotes').then(({ Quotes }) => {
      const quotes = new Quotes();
      quotes.init();
    });
  }

});
