const wpPot = require('wp-pot');

wpPot({
  destFile: 'src/languages/ts_blog_php.pot',
  domain: 'ts-blog',
  package: 'ts-blog',
  src: ['**/*.php'],
});
