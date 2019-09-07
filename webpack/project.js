/* eslint-disable import/no-extraneous-dependencies*/

// Other build files.
const config = require('./config');

// Plugins.
const CopyWebpackPlugin = require('copy-webpack-plugin');

// Main Webpack build setup - Website.
const project = {
  context: config.appPath,
  entry: {
    application: [config.assetsEntry],
    applicationAdmin: [config.assetsAdminEntry],
    applicationBlocks: [config.blocksEntry],
    applicationBlocksEditor: [config.blocksEditorEntry],
  },
  output: {
    path: config.output,
    publicPath: config.publicPath,
    filename: '[name]-[hash].js',
  },
};

// Define what output will export for specific build.
module.exports = project;
