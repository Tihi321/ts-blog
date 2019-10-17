import { useReducer, useEffect, useMemo, useState } from 'react';
import { __ } from '@wordpress/i18n';
import uuid from 'uuid';
import { TextControl } from '@wordpress/components';
import icons from './icons';

import {
  itemsReducer,
  UPDATE_ITEM,
  REMOVE_ITEM,
  ADD_NEW_ITEM,
  MOVE_ITEM_UP,
  MOVE_ITEM_DOWN,
} from '../reducers/items';

export const Repeater = (props) => {
  const {
    value = [{ value: '' }],
    selectLabel = __('Show Options', 'ts-blog'),
    itemLabel = __('Item Text', 'ts-blog'),
    newItem,
    onUpdate,
    Component,
    onChange,
  } = props;

  const [showSelect, setShowSelect] = useState(false);

  // repeater items.
  const [items, dispatchItems] = useReducer(itemsReducer, value.map((item) => {
    return {
      id: uuid.v4(),
      value: item,
    };
  }));

  // Memoize components on start for better performance, avoid unnessesery rerendering.
  const MemoComponent = (Component) && useMemo(() => Component, []);
  const MemoTextComtrol = useMemo(() => TextControl, []);

  // Callbacks.
  const handleItemOnChange = (itemIndex, val, updateType) => {
    dispatchItems({
      type: UPDATE_ITEM,
      itemIndex,
      value: val,
      updateType,
      onUpdate,
    });
  };

  const handleRemoveItem = (itemIndex) => {
    dispatchItems({
      type: REMOVE_ITEM,
      itemIndex,
    });
  };

  const handleItemUp = (itemIndex) => {
    dispatchItems({
      type: MOVE_ITEM_UP,
      itemIndex,
    });
  };

  const handleItemDown = (itemIndex) => {
    dispatchItems({
      type: MOVE_ITEM_DOWN,
      itemIndex,
    });
  };

  const handleAddItem = () => {
    dispatchItems({
      type: ADD_NEW_ITEM,
      newItem,
    });
  };

  // every time items change, return only objets without id generated by uuid for better performance.
  useEffect(() => {
    onChange(items.map((item) => {
      return item.value;
    }));
  }, [items]);

  return (
    <div className="repeater">
      <button onClick={() => setShowSelect(!showSelect)} className="repeater__select-button"><span className="repeater__select-text">{selectLabel}</span><span className={(showSelect) ? 'repeater__select-icon-up' : 'repeater__select-icon-down'}>{icons.triangle}</span></button>
      {(showSelect) && (
        <div className="repeater__options">
          {items &&
            items.map((item, index) => (
              <div className="repeater__options-item" key={item.id}>
                {MemoComponent ? (
                  <MemoComponent
                    item={item}
                    index={index}
                    onItemChange={handleItemOnChange}
                  />
                ) : (
                  <div className="repeater__option">
                    <label className="repeater__option-label" htmlFor="text">{itemLabel}</label>
                    <MemoTextComtrol
                      value={item.value}
                      onChange={(val) => handleItemOnChange(index, val)}
                    />
                  </div>
                )}
                <div className="repeater__arrows">
                  {index > 0 && (
                    <button className="repeater__button-up" onClick={() => handleItemUp(index)}>
                      {icons.arrowUp}
                    </button>
                  )}
                  {index < items.length - 1 && (
                    <button className="repeater__button-down" onClick={() => handleItemDown(index)}>
                      {icons.arrowDown}
                    </button>
                  )}
                </div>
                {(items.length !== 1) && (
                  <button className="repeater__button-remove" onClick={() => handleRemoveItem(index)}>
                    {__('Remove item', 'ts-blog')}
                  </button>
                )}
              </div>
            ))}
          <button className="repeater__button-add" onClick={handleAddItem}>{__('Add item', 'ts-blog')}</button>
        </div>
      )}
    </div>
  );
};
