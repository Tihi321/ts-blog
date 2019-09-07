/* eslint-disable import/no-extraneous-dependencies*/

// Webpack specific imports.
const merge = require('webpack-merge');

// Other build files.
const base = require('./base');
const config = require('./config');
const project = require('./project');

// Plugins.
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

// All Plugins used in development build.
const plugins = [

  // Use BrowserSync to se live preview of all changes.
  new BrowserSyncPlugin(
    {
      host: 'localhost',
      port: 3000,
      proxy: config.proxyUrl,
      files: [
        {
          match: [
            'wp-content/themes/**/*.php',
            'wp-content/plugins/**/*.php',
          ],
        },
      ],
      notify: true,
    },
    {
      reload: true,
    },
  ),
];

// Define developmentConfig setup.
const developmentConfig = {
  plugins,

  devtool: 'inline-cheap-module-source-map',
};

// Combine base with developmentConfig specific config.
module.exports = merge(project, base, developmentConfig);
