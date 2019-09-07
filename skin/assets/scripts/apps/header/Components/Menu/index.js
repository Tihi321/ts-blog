import React from 'react';
import uuidv4 from 'uuid/v4';
import classNames from 'classnames/bind';

import scss, {
  menuClass,
  menuItemClass,
  activeMenuItem,
} from './style.scss';

const styles = classNames.bind(scss);



const Menu = (options) => {

  return (
    <nav className={menuClass}>
    </nav>
  );
};

export default Menu;
