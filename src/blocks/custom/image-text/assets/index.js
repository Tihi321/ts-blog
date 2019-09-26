const imageTextSelector = '.js-block-image-text';

if ($(imageTextSelector).length) {
  import('./lottie-animation').then(({ LottieAnimation }) => {

    const lottieAnimation = new LottieAnimation(`${imageTextSelector}-lottie`);

    lottieAnimation.init();
  });
}
