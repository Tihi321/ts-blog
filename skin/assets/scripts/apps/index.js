import { domReady } from '../utils/general';

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
