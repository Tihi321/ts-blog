import { domReady } from '../../../assets/scripts/utils/dom';

domReady(() => {

  const imageTextSelector = '.js-block-image-text';

  if (document.querySelectorAll(imageTextSelector).length) {
    import('./lottie-animation').then(({ LottieAnimation }) => {
  
      const lottieAnimation = new LottieAnimation(`${imageTextSelector}-lottie`);
  
      lottieAnimation.init();
    });
  }

});
