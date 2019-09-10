import React from 'react';

const SocialBar = ({ options }) => {

  const componentClass = 'social';

  return (
    <div
      className={`${componentClass}__bar`}
    >
      <a
        alt="github"
        className={`${componentClass}__icon ${componentClass}__icon--github`}
        href={options.github}
      >
        <span
          className={`${componentClass}__link-content`}
        >
          Github
        </span>
      </a>
      <a
        alt="linkedin"
        className={`${componentClass}__icon ${componentClass}__icon--linkedin`}
        href={options.linkedin}
      >
        <span
          className={`${componentClass}__link-content`}
        >
          Linkedin
        </span>
      </a>
      <a
        alt="WordPress"
        className={`${componentClass}__icon ${componentClass}__icon--wordpress`}
        href={options.wordpress}
      >
        <span
          className={`${componentClass}__link-content`}
        >
          WordPress
        </span>
      </a>
      <a
        alt="youtube"
        className={`${componentClass}__icon ${componentClass}__icon--youtube`}
        href={options.youtube}
      >
        <span
          className={`${componentClass}__link-content`}
        >
          Youtube
        </span>
      </a>
      <a
        alt="googlePlay"
        className={`${componentClass}__icon ${componentClass}__icon--google-play`}
        href={options.google_play}
      >
        <span
          className={`${componentClass}__link-content`}
        >
          Google play
        </span>
      </a>
      <a
        alt="e-mail"
        className={`${componentClass}__icon ${componentClass}__icon--mail`}
        href={`mailto:${options.mail}`}
      >
        <span
          className={`${componentClass}__link-content`}
        >
          E-mail
        </span>
      </a>
    </div>
  );
};

export default SocialBar;
