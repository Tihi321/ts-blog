const getConfig = require('./services');

// Create Theme/Plugin config variable.
// Define path to the project from the WordPress root. This is used to output the correct path to the manifest.json.
const configData = getConfig('wp-content/themes/ts-blog'); // eslint-disable-line no-use-before-define

// Export config to use in other Webpack files.
module.exports = {
  proxyUrl: 'https://blog.tihomir-selak.from.test',
  absolutePath: configData.absolutePath,
  relativePathFiles: configData.relativePathFiles,
  absolutePathFiles: configData.absolutePathFiles,
  outputPath: configData.outputPath,
  publicPath: configData.publicPath,
  assetsPath: configData.assetsPath,
  fontsPath: configData.fontsPath,
  assetsEntry: configData.assetsEntry,
  assetsAdminEntry: configData.assetsAdminEntry,
  blocksEntry: configData.blocksEntry,
  blocksEditorEntry: configData.blocksEditorEntry,
  nodeModules: configData.nodeModules,
};
