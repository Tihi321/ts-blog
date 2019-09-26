import { __ } from '@wordpress/i18n';
import { PanelBody, SelectControl } from '@wordpress/components';

export const HeadingOptions = (props) => {
  const {
    styleSize,
    onChangeStyleSize,
  } = props;

  return (
    <PanelBody title={__('Heading Details', 'ts-blog')}>

      {onChangeStyleSize &&
        <SelectControl
          label={__('Heading Size', 'ts-blog')}
          value={styleSize}
          options={[
            { label: __('Colossal (150px)', 'ts-blog'), value: 'colossal' },
            { label: __('Giant (115px)', 'ts-blog'), value: 'giant' },
            { label: __('Huge (80px)', 'ts-blog'), value: 'huge' },
            { label: __('Big (50px)', 'ts-blog'), value: 'big' },
            { label: __('Largest (24px)', 'ts-blog'), value: 'largest' },
            { label: __('Larger (22px)', 'ts-blog'), value: 'larger' },
            { label: __('Large (20px)', 'ts-blog'), value: 'large' },
          ]}
          onChange={onChangeStyleSize}
        />
      }

    </PanelBody>
  );
};
