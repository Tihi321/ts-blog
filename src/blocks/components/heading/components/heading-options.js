import { __ } from '@wordpress/i18n';
import { PanelBody, SelectControl } from '@wordpress/components';

export const HeadingOptions = (props) => {
  const {
    styleColor,
    onChangeStyleColor,
    styleSize,
    onChangeStyleSize,
  } = props;

  return (
    <PanelBody title={__('Heading Details', 'ts-blog')}>

      {styleColor &&
        <SelectControl
          label={__('Heading Color', 'ts-blog')}
          value={styleColor}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
            { label: __('Primary', 'ts-blog'), value: 'primary' },
          ]}
          onChange={onChangeStyleColor}
        />
      }

      {styleSize &&
        <SelectControl
          label={__('Heading Size', 'ts-blog')}
          value={styleSize}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
            { label: __('Big', 'ts-blog'), value: 'big' },
          ]}
          onChange={onChangeStyleSize}
        />
      }

    </PanelBody>
  );
};
