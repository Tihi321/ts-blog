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

  // -------------------------------------------------------------
  // Lottie
  if (document.querySelector('.js-hero-lottie')) {
    import('./lottie').then(({ Lottie }) => {
      const lottie = new Lottie();
      lottie.defaultElement.forEach((element) => {
        lottie.init(element);
      });
    });
  }

});
