# Hide WP version
Modifies WordPress version info that gets appended to static file URLs for caching purposes and removes generator meta tag with WordPress version from page head and RSS. This can help to prevent attacks exploiting vulnerabilities existing in that specific WordPress version.

## Installation
1. Edit `const SEED = 1111;` to custom number, e.g. `const SEED = 2458;`. Don't set the number too high to prevent PHP [integer overflow](http://php.net/manual/en/language.types.integer.php#language.types.integer.overflow). 4 digits should be satisfactory.

2. Copy this folder to WordPress plugin directory. Activate the plugin in WordPress admin area.
