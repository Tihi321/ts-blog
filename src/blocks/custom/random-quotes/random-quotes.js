import { __ } from '@wordpress/i18n';
import { TextControl } from '@wordpress/components';
import { InspectorControls } from '@wordpress/editor';
import { getAllActions } from '../../assets/scripts/actions/actions';
import manifest from './manifest.json';

export const Quote = (props) => {
  const {
    attributes: {
      quotes,
    },
  } = props;

  const actions = {
    ...getAllActions(props, manifest),
  };

  const componentClass = 'block-random-quotes-editor';

  return (
    <div className={componentClass}>
      <InspectorControls>
        <label className={`${componentClass}__label`} htmlFor="number">{__('Number of random quotes', 'ts-blocks')}</label>
        <TextControl
          min={1}
          max={15}
          type="number"
          value={quotes}
          onChange={actions.onChangeQuotes}
        />
      </InspectorControls>
      Random quotes block
    </div>
  );
};
