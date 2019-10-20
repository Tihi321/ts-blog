// -------------------------------------------------------------
// Hero
if (document.querySelector('.js-hero-hide-btn')) {
  import('./hero.js').then(({ Hero }) => {
    const hero = new Hero();
    hero.init();
  });
}

// -------------------------------------------------------------
// Lottie
if (document.querySelector('.js-hero-lottie')) {
  import('./lottie.js').then(({ Lottie }) => {
    const lottie = new Lottie();
    lottie.defaultElement.forEach((element) => {
      lottie.init(element);
    });
  });
}

// -------------------------------------------------------------
// Consent
if (document.querySelector('.js-consent')) {
  import('./consent.js').then(({ Consent }) => {
    const consent = new Consent();
    consent.init();
  });
}

// -------------------------------------------------------------
// Share url
if (document.querySelector('.js-share-url')) {
  import('./share.js').then(({ Share }) => {
    const share = new Share();
    share.init();
  });
}
