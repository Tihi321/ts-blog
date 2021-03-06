/* eslint-disable import/no-extraneous-dependencies*/

// Webpack specific imports.
const merge = require('webpack-merge');
const webpack = require('webpack');

// Eightshift blocks.
const blocks = require('./../vendor/infinum/eightshift-blocks/webpack');

// Plugins.
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

// All Plugins used in production and development build.
const plugins = [

  // Create manifest.json file.
  new ManifestPlugin({
    seed: {},
  }),

  new MiniCssExtractPlugin({
    filename: '[name]-[hash].css',
  }),
];

// All Optimizations used in production and development build.
const optimization = {
  runtimeChunk: false,
  namedModules: true,
  namedChunks: true,
};

// All Loaders used in production and development build.
const loaders = {
  rules: [
    {
      test: /\.(js|jsx)$/,
      exclude: /node_modules/,
      use: 'babel-loader',
    },
    {
      test: /\.svelte$/,
      exclude: /node_modules/,
      use: [
        {
          loader: 'svelte-loader',
          options: {
            emitCss: false,
            hotReload: false,
          },
        },
      ],
    },
    {
      test: /\.(png|svg|jpg|jpeg|gif|ico)$/,
      exclude: [/fonts/, /node_modules/],
      use: 'file-loader?name=[name].[ext]',
    },
    {
      test: /\.(eot|otf|ttf|woff|woff2|svg)$/,
      exclude: [/images/, /node_modules/],
      use: 'file-loader?name=[name].[ext]',
    },
    {
      test: /\.scss$/,
      exclude: /node_modules/,
      use: [
        MiniCssExtractPlugin.loader,
        {
          loader: 'css-loader',
          options: {
            sourceMap: true,
            url: false,
          },
        },
        {
          loader: 'postcss-loader',
          options: {
            sourceMap: true,
          },
        },
        {
          loader: 'sass-loader',
          options: {
            sourceMap: true,
          },
        },
        {
          loader: 'import-glob-loader',
        },
      ],
    },
  ],
};

// Main Webpack build setup.
const base = {
  optimization,
  plugins,
  module: loaders,
};

// Combine base with react specific config.
// If Gutenberg is not used, react config can be removed.
module.exports = merge(base, blocks);
