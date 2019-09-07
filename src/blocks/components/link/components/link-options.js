import { __ } from '@wordpress/i18n';
import { URLInput } from '@wordpress/editor';
import { PanelBody, SelectControl } from '@wordpress/components';

export const LinkOptions = (props) => {
  const {
    url,
    onChangeUrl,
    styleColor,
    onChangeColor,
  } = props;

  return (
    <PanelBody title={__('Link Details', 'ts-blog')}>

      {styleColor &&
        <SelectControl
          label={__('Link Color', 'ts-blog')}
          value={styleColor}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
          ]}
          onChange={onChangeColor}
        />
      }

      {onChangeUrl &&
        <div>
          <label htmlFor="url">{__('Link Url', 'ts-blog')}</label>
          <URLInput
            value={url}
            onChange={onChangeUrl}
          />
        </div>
      }

    </PanelBody>
  );
};
