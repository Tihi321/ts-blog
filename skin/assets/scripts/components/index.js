import { domReady } from '../utils/general';

domReady(() => {

  // -------------------------------------------------------------
  // Hero
  if (document.querySelector('.js-hero-hide-btn')) {
    import('./hero').then(({ Hero }) => {
      const hero = new Hero();
      hero.init();
    });
  }

});
