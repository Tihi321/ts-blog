import { AlignmentToolbar } from '@wordpress/editor';
import { Fragment } from '@wordpress/element';

export const LinkToolbar = (props) => {
  const {
    styleAlign,
    onChangeStyleAlign,
  } = props;

  return (
    <Fragment>

      {onChangeStyleAlign &&
        <AlignmentToolbar
          value={styleAlign}
          onChange={onChangeStyleAlign}
        />
      }

    </Fragment>
  );
};
