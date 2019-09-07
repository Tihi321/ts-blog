import React from 'react';
import { render } from 'react-dom';
import App from './App';

export class Header {
  constructor(headerSelector = '.js-header') {
    this.headerElement = document.querySelector(headerSelector);
  }

  init() {
    if (this.headerElement) {
      render(
        <App />,
        this.headerElement
      );
    }
  }
}
