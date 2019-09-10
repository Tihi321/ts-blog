import lottie from 'lottie-web';

export class Lottie {
  constructor(defaultElement = '.js-hero-lottie') {
    this.defaultElement = document.querySelectorAll(defaultElement);
  }

  init(element) {
    const {
      src,
    } = element.dataset;

    lottie.loadAnimation({
      container: element,
      renderer: 'svg',
      loop: true,
      autoplay: true,
      path: src,
      rendererSettings: {
        preserveAspectRatio: 'xMidYMid slice',
        className: 'hero__lottie-svg',
      },
    });
  }
}
