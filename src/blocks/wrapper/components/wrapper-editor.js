import classnames from 'classnames';

export const WrapperEditor = (props) => {
  const {
    children,
    attributes: {
      id,
      styleBackgroundColor,

      styleContentWidth,
      styleContentOffset,
      styleContainerWidth,
      styleContainerSpacing,
      styleSpacingTop,
      styleSpacingBottom,

      styleContentWidthTablet,
      styleContentOffsetTablet,
      styleContainerWidthTablet,
      styleContainerSpacingTablet,
      styleSpacingTopTablet,
      styleSpacingBottomTablet,

      styleContentWidthMobile,
      styleContentOffsetMobile,
      styleContainerWidthMobile,
      styleContainerSpacingMobile,
      styleSpacingTopMobile,
      styleSpacingBottomMobile,
    },
  } = props;

  const wrapperMainClass = 'wrapper';

  const wrapperClass = classnames([
    wrapperMainClass,
    styleBackgroundColor && `${wrapperMainClass}__bg-color--${styleBackgroundColor}`,

    // Desktop.
    styleContentWidth && `${wrapperMainClass}__content-width--${styleContentWidth}`,
    styleSpacingTop && `${wrapperMainClass}__spacing-top--${styleSpacingTop}`,
    styleSpacingBottom && `${wrapperMainClass}__spacing-bottom--${styleSpacingBottom}`,

    // Tablet.
    styleContentWidthTablet && `${wrapperMainClass}__content-width-tablet--${styleContentWidthTablet}`,
    styleSpacingTopTablet && `${wrapperMainClass}__spacing-top-tablet--${styleSpacingTopTablet}`,
    styleSpacingBottomTablet && `${wrapperMainClass}__spacing-bottom-tablet--${styleSpacingBottomTablet}`,

    // Mobile.
    styleContentWidthMobile && `${wrapperMainClass}__content-width-mobile--${styleContentWidthMobile}`,
    styleSpacingTopMobile && `${wrapperMainClass}__spacing-top-mobile--${styleSpacingTopMobile}`,
    styleSpacingBottomMobile && `${wrapperMainClass}__spacing-bottom-mobile--${styleSpacingBottomMobile}`,
  ]);

  const wrapperContainerClass = classnames([
    `${wrapperMainClass}__container`,

    // Desktop.
    styleContainerWidth && `${wrapperMainClass}__container-width--${styleContainerWidth}`,
    styleContainerSpacing && `${wrapperMainClass}__container-spacing--${styleContainerSpacing}`,

    // Tablet.
    styleContainerWidthTablet && `${wrapperMainClass}__container-width-tablet--${styleContainerWidthTablet}`,
    styleContainerSpacingTablet && `${wrapperMainClass}__container-spacing-tablet--${styleContainerSpacingTablet}`,

    // Mobile.
    styleContainerWidthMobile && `${wrapperMainClass}__container-width-mobile--${styleContainerWidthMobile}`,
    styleContainerSpacingMobile && `${wrapperMainClass}__container-spacing-mobile--${styleContainerSpacingMobile}`,
    
  ]);

  const wrapperInnerClass = classnames([
    `${wrapperMainClass}__inner`,

    // Desktop.
    styleContentOffset && `${wrapperMainClass}__inner-offset--${styleContentOffset}`,

    // Tablet.
    styleContentOffsetTablet && `${wrapperMainClass}__inner-offset-tablet--${styleContentOffsetTablet}`,

    // Mobile.
    styleContentOffsetMobile && `${wrapperMainClass}__inner-offset-mobile--${styleContentOffsetMobile}`,
  ]);

  return (
    <div className={wrapperClass} id={id}>
      <div className={wrapperContainerClass}>
        <div className={wrapperInnerClass}>
          {children}
        </div>
      </div>
    </div>
  );
};
