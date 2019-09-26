import classnames from 'classnames';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/editor';

export const LinkEditor = (props) => {
  const {
    blockClass,
    title,
    onChangeTitle,
    styleColor,
    styleAlign,
    icon,
  } = props;

  const componentClass = 'link';

  const linkClass = classnames([
    componentClass,
    `${componentClass}__color--${styleColor}`,
    `${componentClass}__icon--${icon}`,
    `${componentClass}__align--${styleAlign}`,
    `${blockClass}__link`,
  ]);

  return (
    <RichText
      placeholder={__('Add Link Title', 'ts-blog')}
      value={title}
      onChange={onChangeTitle}
      className={linkClass}
      keepPlaceholderOnFocus
    />
  );
};
