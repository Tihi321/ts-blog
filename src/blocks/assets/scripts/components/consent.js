import {
  setCookie,
  getCookie,
} from '../utils/cookies';

export class Consent {
  constructor(consentSelector = '.js-consent') {
    this.consentElement = document.querySelector(consentSelector);
    this.consentButtonElement = document.querySelector('.js-consent-btn');

    this.IS_VISIBLE = 'is-visible';

    this.COOKIE_KEY = 'tsb_consent';
    this.COOKIE_VALUE = '1';
  }

  showConsentNotice = () => {
    if (getCookie(this.COOKIE_KEY) !== this.COOKIE_VALUE) {
      this.consentElement.classList.add(this.IS_VISIBLE);
    }
  }

  hideNotice = () => {
    setCookie(this.COOKIE_KEY, this.COOKIE_VALUE, 100);
    this.consentElement.classList.remove(this.IS_VISIBLE);
  }

  init() {
    this.showConsentNotice();

    if (this.consentElement.classList.contains(this.IS_VISIBLE)) {
      this.consentButtonElement.addEventListener('click', this.hideNotice);
    }
  }
}
