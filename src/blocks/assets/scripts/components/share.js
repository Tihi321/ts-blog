import copy from 'copy-to-clipboard';

export class Share {
  constructor(shareSelector = '.js-share-url') {
    this.shareElements = document.querySelectorAll(shareSelector);
  }

  shareCallback() {
    copy(window.location.href);
  }

  removeElementListeners = () => {
    this.shareElements.forEach((el) => {
      el.removeEventListener('click', this.shareCallback);
    });
  }

  init = () => {
    this.shareElements.forEach((el) => {
      el.addEventListener('click', this.shareCallback);
    });

    window.addEventListener('beforeunload', this.removeElementListeners);
  }
}
