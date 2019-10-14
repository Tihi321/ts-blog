/* eslint-disable import/no-extraneous-dependencies*/

// Other build files.
const config = require('./config');
const path = require('path');

// Main Webpack build setup - Project specific.
const project = {
  context: config.appPath,
  resolve: {
    alias: {
      svelte: path.resolve('node_modules', 'svelte'),
    },
    extensions: ['.mjs', '.js', '.svelte'],
    mainFields: ['svelte', 'browser', 'module', 'main'],
  },
  entry: {
    application: [config.assetsEntry],
    applicationAdmin: [config.assetsAdminEntry],
    applicationBlocks: [config.blocksEntry],
    applicationBlocksEditor: [config.blocksEditorEntry],
  },
  output: {
    path: config.outputPath,
    publicPath: config.publicPath,
    filename: '[name]-[hash].js',
  },
};

// Export project specific configs.
// IF you have multiple builds a flag can be added to the package.json config and use switch case to determin the build config.
module.exports = project;
