import { __ } from '@wordpress/i18n';
import { URLInput } from '@wordpress/editor';
import { PanelBody, SelectControl, TextControl } from '@wordpress/components';

export const ButtonOptions = (props) => {
  const {
    url,
    onChangeUrl,
    styleSize,
    onChangeStyleSize,
    styleColor,
    onChangeStyleColor,
    styleSizeWidth,
    onChangeStyleSizeWidth,
    id,
    onChangeId,
  } = props;

  return (
    <PanelBody title={__('Button Details', 'ts-blog')}>

      {styleColor &&
        <SelectControl
          label={__('Button Color', 'ts-blog')}
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
          label={__('Button Size', 'ts-blog')}
          value={styleSize}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
            { label: __('Big', 'ts-blog'), value: 'big' },
          ]}
          onChange={onChangeStyleSize}
        />
      }

      {styleSizeWidth &&
        <SelectControl
          label={__('Button Size Width', 'ts-blog')}
          value={styleSizeWidth}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
            { label: __('Block', 'ts-blog'), value: 'block' },
          ]}
          onChange={onChangeStyleSizeWidth}
        />
      }

      {onChangeUrl &&
        <div>
          <label htmlFor="url">{__('Button Link', 'ts-blog')}</label>
          <URLInput
            value={url}
            onChange={onChangeUrl}
          />
          <br />
        </div>
      }

      {onChangeId &&
        <div>
          <TextControl
            label={__('Button ID', 'ts-blog')}
            value={id}
            onChange={onChangeId}
          />
        </div>
      }

    </PanelBody>
  );
};
