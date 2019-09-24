/* eslint-disable camelcase */
import React from 'react';
import uuidv4 from 'uuid/v4';



const Menu = ({ items }) => {

  const componentsClass = 'main-menu';

  return (
    <nav className={componentsClass}>
      {items.map((item) => {

        const {
          accent_color,
          url,
          title,
          custom_accent_color,
        } = item;

        const {
          pathname,
          href,
        } = location;

        const itemClass = (custom_accent_color) ? `${componentsClass}__item` : `${componentsClass}__item is-default`;

        const className = (pathname === url || pathname === `${url}/` || href === url) ? `${itemClass} is-active` : `${itemClass}`;

        return (
          <a
            href={url}
            key={uuidv4()}
            className={className}
            style={{ '--color': accent_color || '#FFFFFF' }}
          >
            {title}
          </a>
        );
      })}
    </nav>
  );
};

export default Menu;
