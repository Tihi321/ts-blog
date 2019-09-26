import { __ } from '@wordpress/i18n';
import { MediaPlaceholder } from '@wordpress/editor';
import { PanelBody, SelectControl } from '@wordpress/components';

export const ImageTextOptions = (props) => {
  const {
    attributes: {
      mediaType,
      imagePosition,
    },
    actions: {
      onChangeMedia,
      onChangeMediaType,
      onChangeImagePosition,
    },
  } = props;

  return (
    <PanelBody title={__('Image Text Settings', 'ts-blog')}>

      {onChangeMediaType &&
        <SelectControl
          label={__('Type', 'ts-blog')}
          value={mediaType}
          options={[
            { label: __('Image', 'ts-blog'), value: 'image' },
            { label: __('Lottie', 'ts-blog'), value: 'lottie' },
          ]}
          onChange={onChangeMediaType}
        />
      }
      {onChangeImagePosition &&
        <SelectControl
          label={__('Image Position', 'ts-blog')}
          value={imagePosition}
          options={[
            { label: __('Left', 'ts-blog'), value: 'left' },
            { label: __('Right', 'ts-blog'), value: 'right' },
          ]}
          onChange={onChangeImagePosition}
        />
      }

      {onChangeMedia &&
        <div>
          <label htmlFor="media">{__('Image or Video', 'ts-blog')}</label>
          <MediaPlaceholder
            onSelect={onChangeMedia}
            accept={'image/*,video/*'}
            allowedTypes={['video', 'image', 'application/json']}
          />
        </div>
      }
    </PanelBody>
  );
};
