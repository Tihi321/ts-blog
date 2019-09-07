import { Fragment } from '@wordpress/element';
import { __ } from '@wordpress/i18n';
import { PanelBody, SelectControl } from '@wordpress/components';

export const ParagraphOptions = (props) => {
  const {
    styleColor,
    onChangeStyleColor,
    removeStyle,
  } = props;

  return (
    <Fragment>
      {removeStyle !== true &&
        <PanelBody title={__('Paragraph Details', 'ts-blog')}>

          {styleColor &&
            <SelectControl
              label={__('Paragraph Color', 'ts-blog')}
              value={styleColor}
              options={[
                { label: __('Default', 'ts-blog'), value: 'default' },
                { label: __('Primary', 'ts-blog'), value: 'primary' },
              ]}
              onChange={onChangeStyleColor}
            />
          }
        </PanelBody>
      }
    </Fragment>
  );
};

