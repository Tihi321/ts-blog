import lottie from 'lottie-web';
import scrollMonitor from 'scrollmonitor';

export class LottieAnimation {
  constructor(containerElement) {
    this.$items = $(containerElement);
  }

  init() {
    const items = [];

    $.each(this.$items, (index, element) => {
      this.lottieParms = {
        container: element,
        renderer: 'svg',
        loop: false,
        autoplay: false,
        progressiveLoad: true,
        path: $(element).attr('data-animation'),
      };

      // Prepare animation.
      const animation = lottie.loadAnimation(this.lottieParms);

      const elementWatcher = scrollMonitor.create(element);

      elementWatcher.enterViewport(() => {
        if (!Object.prototype.hasOwnProperty.call(items, index)) {
          animation.stop();
          animation.play();

          items[index] = true;
        }
      });
      
      
    });
  }

}
