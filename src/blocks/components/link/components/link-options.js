import { __ } from '@wordpress/i18n';
import { URLInput } from '@wordpress/editor';
import { PanelBody, SelectControl, ToggleControl } from '@wordpress/components';

export const LinkOptions = (props) => {
  const {
    url,
    onChangeUrl,
    styleColor,
    onChangeStyleColor,
    icon,
    onChangeIcon,
    isAnchor,
    onChangeIsAnchor,
  } = props;

  return (
    <PanelBody title={__('Link Details', 'ts-blog')}>

      {onChangeStyleColor &&
        <SelectControl
          label={__('Link Color', 'ts-blog')}
          value={styleColor}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
          ]}
          onChange={onChangeStyleColor}
        />
      }

      {onChangeIcon &&
        <SelectControl
          label={__('Icon', 'ts-blog')}
          value={icon}
          options={[
            { label: __('None', 'ts-blog'), value: 'none' },
            { label: __('Arrow Right', 'ts-blog'), value: 'arrow-right' },
          ]}
          onChange={onChangeIcon}
        />
      }

      {onChangeIsAnchor &&
        <ToggleControl
          label={__('Anchor', 'ts-blog')}
          checked={isAnchor}
          onChange={onChangeIsAnchor}
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
