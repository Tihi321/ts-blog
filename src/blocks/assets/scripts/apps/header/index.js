import React from 'react';
import { render } from 'react-dom';
import App from './App';

export class Header {
  constructor(headerSelector = '.js-header') {
    this.headerElement = document.querySelector(headerSelector);
  }

  init() {
    if (this.headerElement) {
      const {
        accentColor,
      } = this.headerElement.dataset;
      render(
        <App
          accentColor={accentColor}
          className="navbar"
        />,
        this.headerElement
      );
    }
  }
}
