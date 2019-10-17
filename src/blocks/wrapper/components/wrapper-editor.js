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

      styleContentWidthDesktop,
      styleContentOffsetDesktop,
      styleContainerWidthDesktop,
      styleContainerSpacingDesktop,
      styleSpacingTopDesktop,
      styleSpacingBottomDesktop,

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

    // Large.
    styleSpacingTop && `${wrapperMainClass}__spacing-top--${styleSpacingTop}`,
    styleSpacingBottom && `${wrapperMainClass}__spacing-bottom--${styleSpacingBottom}`,

    // Desktop.
    styleSpacingTopDesktop && `${wrapperMainClass}__spacing-top-desktop--${styleSpacingTopDesktop}`,
    styleSpacingBottomDesktop && `${wrapperMainClass}__spacing-bottom-desktop--${styleSpacingBottomDesktop}`,

    // Tablet.
    styleSpacingTopTablet && `${wrapperMainClass}__spacing-top-tablet--${styleSpacingTopTablet}`,
    styleSpacingBottomTablet && `${wrapperMainClass}__spacing-bottom-tablet--${styleSpacingBottomTablet}`,

    // Mobile.
    styleSpacingTopMobile && `${wrapperMainClass}__spacing-top-mobile--${styleSpacingTopMobile}`,
    styleSpacingBottomMobile && `${wrapperMainClass}__spacing-bottom-mobile--${styleSpacingBottomMobile}`,
  ]);

  const wrapperContainerClass = classnames([
    `${wrapperMainClass}__container`,

    // Large.
    styleContainerWidth && `${wrapperMainClass}__container-width--${styleContainerWidth}`,
    styleContainerSpacing && `${wrapperMainClass}__container-spacing--${styleContainerSpacing}`,

    // Desktop.
    styleContainerWidthDesktop && `${wrapperMainClass}__container-width-desktop--${styleContainerWidthDesktop}`,
    styleContainerSpacingDesktop && `${wrapperMainClass}__container-spacing-desktop--${styleContainerSpacingDesktop}`,

    // Tablet.
    styleContainerWidthTablet && `${wrapperMainClass}__container-width-tablet--${styleContainerWidthTablet}`,
    styleContainerSpacingTablet && `${wrapperMainClass}__container-spacing-tablet--${styleContainerSpacingTablet}`,

    // Mobile.
    styleContainerWidthMobile && `${wrapperMainClass}__container-width-mobile--${styleContainerWidthMobile}`,
    styleContainerSpacingMobile && `${wrapperMainClass}__container-spacing-mobile--${styleContainerSpacingMobile}`,
    
  ]);

  const wrapperInnerClass = classnames([
    `${wrapperMainClass}__inner`,

    // Large.
    styleContentWidth && `${wrapperMainClass}__inner-content-width--${styleContentWidth}`,
    styleContentOffset && `${wrapperMainClass}__inner-offset--${styleContentOffset}`,

    // Desktop.
    styleContentWidthDesktop && `${wrapperMainClass}__inner-content-width-desktop--${styleContentWidthDesktop}`,
    styleContentOffsetDesktop && `${wrapperMainClass}__inner-offset-desktop--${styleContentOffsetDesktop}`,

    // Tablet.
    styleContentWidthTablet && `${wrapperMainClass}__inner-content-width-tablet--${styleContentWidthTablet}`,
    styleContentOffsetTablet && `${wrapperMainClass}__inner-offset-tablet--${styleContentOffsetTablet}`,

    // Mobile.
    styleContentWidthMobile && `${wrapperMainClass}__inner-content-width-mobile--${styleContentWidthMobile}`,
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
