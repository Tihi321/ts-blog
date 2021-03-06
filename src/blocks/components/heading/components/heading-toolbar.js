import { AlignmentToolbar } from '@wordpress/editor';
import { Fragment } from '@wordpress/element';
import { HeadingLevel } from '../../../toolbars/heading-level';

export const HeadingToolbar = (props) => {
  const {
    level,
    onChangeLevel,
    styleAlign,
    onChangeStyleAlign,
  } = props;

  return (
    <Fragment>
      {onChangeLevel &&
        <HeadingLevel
          selectedLevel={level}
          onChange={onChangeLevel}
        />
      }

      {onChangeStyleAlign &&
        <AlignmentToolbar
          value={styleAlign}
          onChange={onChangeStyleAlign}
        />
      }

    </Fragment>
  );
};
