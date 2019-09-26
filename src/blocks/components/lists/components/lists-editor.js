import classnames from 'classnames';
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/editor';

export const ListsEditor = (props) => {
  const {
    blockClass,
    content,
    onChangeContent,
    ordered,
    onChangeOrdered,
    styleType,
  } = props;

  const componentClass = 'lists';

  const listsClass = classnames([
    componentClass,
    `${componentClass}__type--${styleType}`,
    `${blockClass}__lists`,
  ]);

  return (
    <RichText
      tagName={ordered}
      multiline="li"
      className={listsClass}
      placeholder={__('Add your list item', 'ts-blog')}
      onChange={onChangeContent}
      value={content}
      onTagNameChange={onChangeOrdered}
    />
  );
};
