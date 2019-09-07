#!/usr/bin/env sh

function buildBlog() {
  cd 'wp-content/themes/ts-blog';
  npm install
  npm rebuild node-sass
  composer install --no-dev --no-scripts
  npm run build
  cd '../../../';
}

buildBlog;
