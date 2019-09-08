/* eslint-disable camelcase */
import React, { useState, Fragment } from 'react';
import { useTween } from 'react-use';

import Menu from '../menu';
import SocialBar from '../socialbar';

const Navbar = ({
  logo,
  home_url,
  disclaimer,
  blog_info,
  menu,
  social,
}) => {

  const componentClass = 'modal';

  const [openNav, setOpenNav] = useState(false);

  const value = useTween('inOutExpo', 350, 200);
  const openMenuIcontranslate = (100 - (value * 100));

  const modalClassName = (openNav) ? `${componentClass} is-active` : componentClass;

  const setActiveToggle = () => {
    setOpenNav(!openNav);
  };

  return (
    <Fragment>
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
      <div
        style={{
          transform: `translateY(-${openMenuIcontranslate}%)`,
        }}
        className={`${componentClass}__navbar`}
      >
        <button
          id="open-menu"
          type="button"
          className={`${componentClass}__btn-open`}
          onClick={setActiveToggle}
        >
          <span className={`${componentClass}__btn-text`}>
            Open Menu
          </span>
        </button>
      </div>
      <div className={modalClassName}>
        <div className={`${componentClass}__navbar`}>
          <button
            type="button"
            className={`${componentClass}__btn-close`}
            onClick={setActiveToggle}
          >
            <span className={`${componentClass}__btn-text`}>
              Close Menu
            </span>
          </button>
        </div>
        {(!logo) ?
          <a
            href={logo}
            className={`${componentClass}__link`}
          >
            <h1 className={`${componentClass}__title`}>Tihomimir Selak</h1>
          </a> :
          <a
            href={logo}
            className={`${componentClass}__link ${componentClass}__link-image`}
          >
            <img
              src={logo}
              className={`${componentClass}__logo`}
              alt={blog_info}
            />
          </a>
        }
        <Menu
          items={menu.items}
        />
        <SocialBar
          options={social}
        />
        <div className={`${componentClass}__disclaimer`}>
          {disclaimer}
        </div>
      </div>
    </Fragment>
  );
};

export default Navbar;
