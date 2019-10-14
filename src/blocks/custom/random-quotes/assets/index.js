import { domReady } from '../../../assets/scripts/utils/dom';

domReady(() => {

  // -------------------------------------------------------------
  // Quotes
  if (document.querySelector('.js-block-quotes')) {
    import('./app.svelte').then(({ App }) => {
      const app = new App({
        target: document.querySelector('.js-block-quotes'),
      });
    });
  }

});
