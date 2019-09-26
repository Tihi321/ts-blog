import { Fragment } from '@wordpress/element';
import { InspectorControls, BlockControls } from '@wordpress/editor';

import { getActions } from 'EighshiftBlocksGetActions';
import manifest from './manifest.json';

import { LinkEditor } from '../../components/link/components/link-editor';
import { LinkOptions } from '../../components/link/components/link-options';
import { LinkToolbar } from '../../components/link/components/link-toolbar';

export const Link = (props) => {
  const {
    attributes: {
      blockClass,
      title,
      url,
      icon,
      styleColor,
      styleAlign,
      isAnchor,
    },
  } = props;

  const actions = getActions(props, manifest);

  return (
    <Fragment>
      <InspectorControls>
        <LinkOptions
          url={url}
          onChangeUrl={actions.onChangeUrl}
          styleColor={styleColor}
          onChangeStyleColor={actions.onChangeStyleColor}
          icon={icon}
          onChangeIcon={actions.onChangeIcon}
          isAnchor={isAnchor}
          onChangeIsAnchor={actions.onChangeIsAnchor}
        />
      </InspectorControls>
      <BlockControls>
        <LinkToolbar
          styleAlign={styleAlign}
          onChangeStyleAlign={actions.onChangeStyleAlign}
        />
      </BlockControls>
      <LinkEditor
        blockClass={blockClass}
        title={title}
        onChangeTitle={actions.onChangeTitle}
        styleColor={styleColor}
        icon={icon}
        styleAlign={styleAlign}
        isAnchor={isAnchor}
      />
    </Fragment>
  );
};
