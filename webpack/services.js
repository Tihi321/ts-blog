// Eightshift blocks Config.
const path = require('path');

const blockConfig = require('./../vendor/infinum/eightshift-blocks/webpack/config');

// Generate all paths required for Webpack build to work.
function getConfig(assetsPath) {

  // Clear all shalshes and set project path the correct way.
  const relativePath = assetsPath.replace(/^\/|\/$/g, '');

  // Create absolute path from the projects relative path.
  const absolutePath = `${path.resolve(`/${__dirname}`, '..')}`;

  // Define projects relative path for file locations.
  const relativePathFiles = `${relativePath}/src/blocks`;

  // Define projects absolute path for file locations.
  const absolutePathFiles = `${absolutePath}/src/blocks`;

  // Load Blocks configuration.
  const blocks = blockConfig('', absolutePath);

  return {
    absolutePath,
    relativePathFiles,
    absolutePathFiles,

    // Output files absolute location.
    outputPath: `${absolutePath}/skin/public/`,

    // Output files relative location, added before every output file in manifes.json. Should start and end with "/".
    publicPath: `/${relativePath}/skin/public/`,

    // Source files relative locations.
    assetsPath: `/${relativePathFiles}/assets`,
    fontsPath: `/${relativePathFiles}/assets/fonts`,

    // Source files entries absolute locations.
    assetsEntry: `${absolutePath}/skin/assets/application.js`,
    assetsAdminEntry: `${absolutePath}/skin/assets/application-admin.js`,
    blocksEntry: blocks.blocksEntry,
    blocksEditorEntry: blocks.blocksEditorEntry,
    nodeModules: `${absolutePath}/node_modules`,
  };
}

// Define what output will export for specific build.
module.exports = getConfig;
