import { __ } from '@wordpress/i18n';
import { PanelBody, TextControl, SelectControl } from '@wordpress/components';

export const WrapperOptions = (props) => {
  const {
    attributes: {
      styleBackgroundColor,
      styleTextColor,
      styleContentWidth,
      styleContentOffset,
      styleContainerWidth,
      styleContainerSpacing,
      styleSpacingTop,
      styleSpacingTopTablet,
      styleSpacingTopMobile,
      styleSpacingBottom,
      styleSpacingBottomTablet,
      styleSpacingBottomMobile,
      styleShowOnlyMobile,
      id,
    },
    actions: {
      onChangeStyleBackgroundColor,
      onChangeStyleTextColor,
      onChangeStyleContentWidth,
      onChangeStyleContentOffset,
      onChangeStyleContainerWidth,
      onChangeStyleContainerSpacing,
      onChangeStyleSpacingTop,
      onChangeStyleSpacingTopTablet,
      onChangeStyleSpacingTopMobile,
      onChangeStyleSpacingBottom,
      onChangeStyleSpacingBottomTablet,
      onChangeStyleSpacingBottomMobile,
      onChangeStyleShowOnlyMobile,
      onChangeId,
    },
  } = props;

  const maxCols = 12;
  const colsOutput = [];

  for (let index = 1; index <= maxCols; index++) {
    colsOutput.push({ label: `${index} - (${Math.round((100 / maxCols) * index)}%)`, value: index });
  }

  const spacingOptions = [
    { label: __('Not Set', 'ts-blog'), value: '' },
    { label: __('Biggest (100px)', 'ts-blog'), value: 'biggest' },
    { label: __('Bigger (90px)', 'ts-blog'), value: 'bigger' },
    { label: __('Big (80px)', 'ts-blog'), value: 'big' },
    { label: __('Largest (70px)', 'ts-blog'), value: 'largest' },
    { label: __('Larger (60px)', 'ts-blog'), value: 'larger' },
    { label: __('Large (50px)', 'ts-blog'), value: 'large' },
    { label: __('Default (40px)', 'ts-blog'), value: 'default' },
    { label: __('Medium (30px)', 'ts-blog'), value: 'medium' },
    { label: __('Small (20px)', 'ts-blog'), value: 'small' },
    { label: __('Tiny (10px)', 'ts-blog'), value: 'tiny' },
    { label: __('No padding (0px)', 'ts-blog'), value: 'no-spacing' },
  ];

  return (
    <PanelBody title={__('Utility', 'ts-blog')}>
      <h3>{__('Colors', 'ts-blog')}</h3>

      {styleBackgroundColor &&
        <SelectControl
          label={__('Background Color', 'ts-blog')}
          value={styleBackgroundColor}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
            { label: __('Grey', 'ts-blog'), value: 'grey' },
            { label: __('Black', 'ts-blog'), value: 'black' },
          ]}
          onChange={onChangeStyleBackgroundColor}
        />
      }

      {styleTextColor &&
        <SelectControl
          label={__('Text Color', 'ts-blog')}
          value={styleTextColor}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
          ]}
          onChange={onChangeStyleTextColor}
        />
      }

      <hr />
      <h3>{__('Content', 'ts-blog')}</h3>

      {styleContentWidth &&
        <SelectControl
          label={__('Content Width', 'ts-blog')}
          value={styleContentWidth}
          options={colsOutput}
          onChange={onChangeStyleContentWidth}
        />
      }

      {styleContentOffset &&
        <SelectControl
          label={__('Content Offset', 'ts-blog')}
          value={styleContentOffset}
          options={[
            { label: __('No offset', 'ts-blog'), value: 'none' },
            { label: __('Center', 'ts-blog'), value: 'center' },
          ]}
          onChange={onChangeStyleContentOffset}
        />
      }

      <hr />
      <h3>{__('Container', 'ts-blog')}</h3>
      {styleContainerWidth &&
        <SelectControl
          label={__('Container Width', 'ts-blog')}
          value={styleContainerWidth}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
            { label: __('Medium', 'ts-blog'), value: 'medium' },
            { label: __('No Width', 'ts-blog'), value: 'no-width' },
          ]}
          onChange={onChangeStyleContainerWidth}
        />
      }

      {styleContainerSpacing &&
        <SelectControl
          label={__('Container Spacing', 'ts-blog')}
          value={styleContainerSpacing}
          options={[
            { label: __('Default', 'ts-blog'), value: 'default' },
            { label: __('No Spacing', 'ts-blog'), value: 'no-spacing' },
          ]}
          onChange={onChangeStyleContainerSpacing}
        />
      }

      <hr />
      <h3>{__('Spacing TOP', 'ts-blog')}</h3>

      {styleSpacingTop &&
        <SelectControl
          label={__('Desktop', 'ts-blog')}
          value={styleSpacingTop}
          options={spacingOptions}
          onChange={onChangeStyleSpacingTop}
        />
      }

      {styleSpacingTopTablet &&
        <SelectControl
          label={__('Tablet', 'ts-blog')}
          value={styleSpacingTopTablet}
          options={spacingOptions}
          onChange={onChangeStyleSpacingTopTablet}
        />
      }

      {styleSpacingTopMobile &&
        <SelectControl
          label={__('Mobile', 'ts-blog')}
          value={styleSpacingTopMobile}
          options={spacingOptions}
          onChange={onChangeStyleSpacingTopMobile}
        />
      }

      <hr />
      <h3>{__('Spacing BOTTOM', 'ts-blog')}</h3>
      {styleSpacingBottom &&
        <SelectControl
          label={__('Desktop', 'ts-blog')}
          value={styleSpacingBottom}
          options={spacingOptions}
          onChange={onChangeStyleSpacingBottom}
        />
      }

      {styleSpacingBottomTablet &&
        <SelectControl
          label={__('Tablet', 'ts-blog')}
          value={styleSpacingBottomTablet}
          options={spacingOptions}
          onChange={onChangeStyleSpacingBottomTablet}
        />
      }

      {styleSpacingBottomMobile &&
        <SelectControl
          label={__('Mobile', 'ts-blog')}
          value={styleSpacingBottomMobile}
          options={spacingOptions}
          onChange={onChangeStyleSpacingBottomMobile}
        />
      }

      <hr />
      <h3>{__('Visibility', 'ts-blog')}</h3>
      {styleShowOnlyMobile &&
        <SelectControl
          label={__('Show Block Only On Mobile', 'ts-blog')}
          value={styleShowOnlyMobile}
          options={[
            { label: __('False', 'ts-blog'), value: 'false' },
            { label: __('True', 'ts-blog'), value: 'true' },
          ]}
          onChange={onChangeStyleShowOnlyMobile}
        />
      }

      <hr />
      <h3>{__('General', 'ts-blog')}</h3>
      {id &&
        <TextControl
          label={__('Section ID', 'ts-blog')}
          value={id}
          onChange={onChangeId}
        />
      }
    </PanelBody>
  );
};
