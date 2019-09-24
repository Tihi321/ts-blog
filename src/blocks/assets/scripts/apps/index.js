import { domReady } from '../utils/dom';

domReady(() => {

  // -------------------------------------------------------------
  // Header App
  if (document.querySelector('.js-header')) {
    import('./header').then(({ Header }) => {
      const header = new Header();
      header.init();
    });
  }

});
