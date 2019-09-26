import { __ } from '@wordpress/i18n';
import { PanelBody, SelectControl } from '@wordpress/components';

export const ListsOptions = (props) => {
  const {
    styleType,
    onChangeStyleType,
  } = props;

  return (
    <PanelBody title={__('List Details', 'ts-blog')}>

      {onChangeStyleType &&
        <SelectControl
          label={__('List Font Type', 'ts-blog')}
          value={styleType}
          options={[
            { label: __('Sans Serif Font', 'ts-blog'), value: 'primary' },
            { label: __('Serif Font', 'ts-blog'), value: 'secondary' },
          ]}
          onChange={onChangeStyleType}
        />
      }

    </PanelBody>
  );
};
