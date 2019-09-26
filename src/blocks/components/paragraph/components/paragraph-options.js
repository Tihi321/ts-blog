import { Fragment } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { PanelBody, SelectControl } from '@wordpress/components';

export const ParagraphOptions = (props) => {
  const {
    styleColor,
    onChangeStyleColor,
    styleSize,
    onChangeStyleSize,
    removeStyle,
  } = props;

  return (
    <Fragment>
      {removeStyle !== true &&
        <PanelBody title={__('Paragraph Details', 'ts-blog')}>

          {onChangeStyleColor &&
            <SelectControl
              label={__('Paragraph Color', 'ts-blog')}
              value={styleColor}
              options={[
                { label: __('Default', 'ts-blog'), value: 'default' },
                { label: __('Silver', 'ts-blog'), value: 'silver' },
                { label: __('White', 'ts-blog'), value: 'white' },
              ]}
              onChange={onChangeStyleColor}
            />
          }
            
          {onChangeStyleSize &&
            <SelectControl
              label={__('Paragraph Font Size', 'ts-blog')}
              value={styleSize}
              options={[
                { label: __('Default (18px)', 'ts-blog'), value: 'default' },
                { label: __('Largest (24px)', 'ts-blog'), value: 'largest' },
              ]}
              onChange={onChangeStyleSize}
            />
          }
        </PanelBody>
      }
    </Fragment>
  );
};
