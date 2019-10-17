import { Fragment } from 'react';
import { TextControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { Repeater } from './repeater';

export const RepeaterSelect = (props) => {

  const {
    value = [{ label: '', value: '' }],
    newItem = { label: '', value: '' },
    onChange,
    selectLabel = __('Show Select', 'ts-blog'),
    itemLabel = __('Select field', 'ts-blog'),
  } = props;

  return (
    <Repeater
      selectLabel={selectLabel}
      itemLabel={itemLabel}
      value={value}
      newItem={newItem}
      onChange={onChange}
      Component={({ item, index, onItemChange }) => {
        return (
          <Fragment>
            <div className="repeater-select__option-item">
              <label className="repeater-select__option-label" htmlFor="text">{__('Value', 'ts-blog')}</label>
              <TextControl
                value={item.value.value}
                onChange={(val) => onItemChange(index, val, 'value')}
              />
            </div>
            <div className="repeater-select__option-item">
              <label className="repeater-select__option-label" htmlFor="text">{__('Label', 'ts-blog')}</label>
              <TextControl
                value={item.value.label}
                onChange={(val) => onItemChange(index, val, 'label')}
              />
            </div>
          </Fragment>
        );
      }}
      onUpdate={(values, newValue, updateType) => {
        switch (updateType) {
          case 'label':
            return {
              ...values,
              value: {
                ...values.value,
                label: newValue,
              },
            };
          case 'value':
            return {
              ...values,
              value: {
                ...values.value,
                value: newValue,
              },
            };
          default:
            return values;
        }
      }}
    />
  );
};

