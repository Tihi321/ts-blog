import { domReady } from '../utils/dom';

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

  // -------------------------------------------------------------
  // Consent
  if (document.querySelector('.js-consent')) {
    import('./consent').then(({ Consent }) => {
      const consent = new Consent();
      consent.init();
    });
  }

  // -------------------------------------------------------------
  // Share url
  if (document.querySelector('.js-share-url')) {
    import('./share').then(({ Share }) => {
      const share = new Share();
      share.init();
    });
  }

});
