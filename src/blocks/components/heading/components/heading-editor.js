import classnames from 'classnames';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/editor';

export const HeadingEditor = (props) => {
  const {
    content,
    styleAlign,
    styleSize,
    onChangeContent,
  } = props;

  const componentClass = 'heading';

  const headingClass = classnames([
    componentClass,
    `${componentClass}__align--${styleAlign}`,
    `${componentClass}__size--${styleSize}`,
  ]);

  return (
    <RichText
      placeholder={__('Add your heading', 'ts-blog')}
      className={headingClass}
      onChange={onChangeContent}
      value={content}
    />
  );
};
