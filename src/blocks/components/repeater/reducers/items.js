import uuid from 'uuid';
import { swapItems } from '../../../assets/scripts/utils/modifiers';

export const UPDATE_ITEM = 'UPDATE_ITEM';
export const REMOVE_ITEM = 'REMOVE_ITEM';
export const ADD_NEW_ITEM = 'ADD_NEW_ITEM';
export const MOVE_ITEM_UP = 'MOVE_ITEM_UP';
export const MOVE_ITEM_DOWN = 'MOVE_ITEM_DOWN';

// update item on that index in array, with custom update or default input field.
const handleUpdateItem = (state, itemIndex, newValue, onUpdate, updateType) => {
  const newState = state.map((values, index) => {
    if (itemIndex !== index) {
      return values;
    }

    if (onUpdate) {
      return onUpdate(values, newValue, updateType);
    }

    return { ...values, value: newValue };

  });

  return newState;
};

// callback for removing items. do not remove last item.
const handleRemoveItem = (state, itemIndex) => {
  if (state.length === 1) {
    return state;
  }
  return state.filter((value, id) => itemIndex !== id);
};

const moveItemUp = (state, itemIndex) => {
  return swapItems(state, itemIndex, itemIndex - 1);
};

const moveItemDown = (state, itemIndex) => {
  return swapItems(state, itemIndex, itemIndex + 1);
};

// add item and add temporary uuid generated id for key inside the map.
const addNewItem = (state, newItem) => {
  const newItemsArr = (newItem) ? [...state, { id: uuid.v4(), value: newItem }] : [...state, { id: uuid.v4(), value: '' }];
  return newItemsArr;

};

export const itemsReducer = (state, action) => {
  switch (action.type) {
    case UPDATE_ITEM:
      return handleUpdateItem(state, action.itemIndex, action.value, action.onUpdate, action.updateType);
    case REMOVE_ITEM:
      return handleRemoveItem(state, action.itemIndex);
    case ADD_NEW_ITEM:
      return addNewItem(state, action.newItem);
    case MOVE_ITEM_UP:
      return moveItemUp(state, action.itemIndex);
    case MOVE_ITEM_DOWN:
      return moveItemDown(state, action.itemIndex);
    default:
      return state;
  }
};
