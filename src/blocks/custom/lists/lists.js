import { Fragment } from '@wordpress/element';
import { InspectorControls } from '@wordpress/editor';

import { getActions } from 'EighshiftBlocksGetActions';
import manifest from './manifest.json';

import { ListsEditor } from '../../components/lists/components/lists-editor';
import { ListsOptions } from '../../components/lists/components/lists-options';

export const Lists = (props) => {
  const {
    attributes: {
      blockClass,
      content,
      ordered,
      styleType,
    },
  } = props;

  const actions = getActions(props, manifest);

  return (
    <Fragment>
      <InspectorControls>
        <ListsOptions
          styleType={styleType}
          onChangeStyleType={actions.onChangeStyleType}
        />
      </InspectorControls>
      <ListsEditor
        blockClass={blockClass}
        content={content}
        onChangeContent={actions.onChangeContent}
        ordered={ordered}
        onChangeOrdered={actions.onChangeOrdered}
        styleType={styleType}
      />
    </Fragment>
  );
};
