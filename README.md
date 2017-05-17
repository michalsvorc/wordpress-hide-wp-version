# Hide WP version number
Modify WordPress core version that gets appended to style and script URLs for caching. This plugin converts SEMVER string to number and multiplies it by custom number, so new versions of static files are cached on core updates. Also removes generator meta tag with WP version from page head and RSS.

## Installation
1. Edit `const SEED = 1111;` to custom number, e.g. `const SEED = 2458;`. Don't set the number too high to prevent PHP [integer overflow](http://php.net/manual/en/language.types.integer.php#language.types.integer.overflow). 4 digits should be satisfactory.

2. Copy this folder to WordPress plugin directory. Activate the plugin in WordPress admin area.
