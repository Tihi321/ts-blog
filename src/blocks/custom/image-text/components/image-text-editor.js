import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/editor';

export const ImageTextEditor = (props) => {
  const {
    attributes: {
      blockClass,
      mediaType,
      heading,
      paragraph,
      imagePosition,
      mediaUrl,
    },
    actions: {
      onChangeHeading,
      onChangeParagraph,
    },
  } = props;

  const componentClass = `
    ${blockClass}
    ${blockClass}__media-position--${imagePosition}
  `;
  const mediaWrapClass = `${blockClass}__media-wrap`;
  const imgClass = `${blockClass}__img`;
  const lottieClass = `
    ${blockClass}__lottie
    js-lottie
  `;
  const wrapClass = `${blockClass}__wrap`;
  const headingClass = `${blockClass}__heading`;
  const contentClass = `${blockClass}__paragraph`;

  return (
    <div className={componentClass}>
      <div className={mediaWrapClass}>
        {mediaType === 'lottie' &&
          <div className={lottieClass} data-animation={mediaUrl}>
            {__('Lottie Animation', 'ts-blog')} <br />
            {mediaUrl}
          </div>
        }

        {mediaType === 'image' &&
          <img src={mediaUrl} className={imgClass} alt="" />
        }
      </div>
      <div className={wrapClass}>
        <div className={headingClass}>
          <RichText
            placeholder={__('Add your heading', 'ts-blog')}
            onChange={onChangeHeading}
            value={heading}
          />
        </div>
        <div className={contentClass}>
          <RichText
            placeholder={__('Add your paragraph', 'ts-blog')}
            onChange={onChangeParagraph}
            value={paragraph}
          />
        </div>
      </div>
    </div>
  );
};
