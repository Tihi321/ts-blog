const wpPot = require('wp-pot');

wpPot({
  destFile: 'languages/ts_blog_php.pot',
  domain: 'ts-blog',
  package: 'ts-blog',
  src: ['src/**/*.php'],
});
