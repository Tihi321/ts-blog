import { __ } from '@wordpress/i18n';
import { TextControl } from '@wordpress/components';
import { InspectorControls } from '@wordpress/editor';
import { getAllActions } from '../../assets/scripts/actions/actions';
import manifest from './manifest.json';

export const Quote = (props) => {
  const {
    attributes: {
      quotes,
      interval,
    },
  } = props;

  console.log(quotes);
  console.log(interval);

  const actions = getAllActions(props, manifest);

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
        <label className={`${componentClass}__label`} htmlFor="number">{__('Interval', 'ts-blocks')}</label>
        <TextControl
          min={2000}
          max={50000}
          type="number"
          value={interval}
          onChange={actions.onChangeInterval}
        />
      </InspectorControls>
      <div>
        <h2>Random quotes</h2>
        <div>
          <div>number of quotes: {quotes}</div>
          <div>Time before quotes switch: {interval}</div>
        </div>
      </div>
    </div>
  );
};
