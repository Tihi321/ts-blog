export class Hero {
  constructor(heroSelector = '.js-hero-hide-btn') {
    this.heroElement = document.querySelector(heroSelector);
    this.iconElement = document.querySelector('.js-hero-hide-icon');
    this.descriptionElement = document.querySelector('.js-hero-description');

    this.HIDDEN_CLASS = 'is-hidden';
    this.INACTIVE_CLASS = 'is-inactive';
  }

  toggleActive = () => {
    this.descriptionElement.classList.toggle(this.HIDDEN_CLASS);
    this.iconElement.classList.toggle(this.INACTIVE_CLASS);
  }

  init() {
    this.heroElement.addEventListener('click', this.toggleActive);
  }
}
