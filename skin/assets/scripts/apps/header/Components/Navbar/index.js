import React, { useState } from 'react';
import { useTween } from 'react-use';

import Menu from '../Menu';
import SocialBar from '../SocialBar';

import {
  menuIconClass,
  navBarClass,
  menuIconCloseClass,
  modalGlobal,
  titleClass,
  disclaimerClass,
  menuButtonsText,
} from './style.scss';

const Navbar = (props) => {

  console.log(props);

  const componentClass = 'modal';

  const [openNav, setOpenNav] = useState(false);

  const value = useTween('inOutExpo', 350, 200);
  const openMenuIcontranslate = (100 - (value * 100));

  const modalClassName = (openNav) ? `${componentClass} is-active` : componentClass;

  const setActiveToggle = () => {
    setOpenNav(!openNav);
  };

  return (
    <div className={`${componentClass}__parent`}>
      {(openNav) &&
      (
        <style>
          {`
            :root {
              overflow: hidden;
            }
          `}
        </style>
      )}
      <div className={navBarClass}>
        <button
          style={{
            transform: `translateY(-${openMenuIcontranslate}%)`,
          }}
          id="open-menu"
          type="button"
          className={`${componentClass}__open`}
          onClick={setActiveToggle}
        >
          <span className={`${componentClass}__btn-text`}>
            Open Menu
          </span>
        </button>
      </div>
      <div className={modalClassName}>
        <div className={navBarClass}>
          <button type="button" className={`${componentClass}__close`} onClick={setActiveToggle}>
            <span className={`${componentClass}__btn-text`}>
              Close Menu
            </span>
          </button>
        </div>
        <h1 className={titleClass}>
          Tihomir Selak
        </h1>
        <div className={disclaimerClass}>
          NextJs Frontend, Wordpress Backend
        </div>
      </div>
    </div>
  );
};

export default Navbar;
