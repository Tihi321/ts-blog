// Other build files.
const config = require('./webpack/config');

// Set fonts path.
const fontsPath = `${config.fontsPath}`;

// Load plugins for postcss.
const postcssFontMagician = require('postcss-font-magician');
const cssNano = require('cssnano');
const postcssNext = require('postcss-cssnext');

// All Plugins used in production and development build.
const plugins = [
  postcssFontMagician({
    custom: {
      portfolio: {
        variants: {
          normal: {
            400: {
              url: {
                woff: `${fontsPath}/portfolio.woff`,
              },
            },
          },
        },
      },
    },
    variants: {
      Karla: {
        400: ['woff2', 'woff'],
        700: ['woff2', 'woff'],
      },
      Rubik: {
        400: ['woff2', 'woff'],
        700: ['woff2', 'woff'],
      },
    },
    display: 'swap',
    foundries: ['custom', 'google'],
  }),
  postcssNext({
    browsers: [
      'last 2 version',
    ],
    features: {
      rem: false,
      customProperties: {
        warnings: false,
        preserve: true,
      },
    },
  }),
];

module.exports = () => {

  // // Use only for production build
  if (config.env === 'production') {
    plugins.push(cssNano);
  }

  return { plugins };
};
