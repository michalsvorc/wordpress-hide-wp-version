<?php
namespace WPSvorc;
/**
* Plugin Name:     Hide WP version
* Plugin URI:      https://github.com/michalsvorc/wpsvorc-hide-wp-version
* Description:     Hide WordPress core version from script and style src suffix. Removes generator meta tag from head.
* Author:          Michal Švorc
* Author URI:      https://svorc.sk
* Text Domain:     wpsvorc-hide-wp-version
* Domain Path:     /languages
* Version:         1.0.0
* @author Michal Švorc <michal@svorc.sk>
* @copyright 2017 Michal Švorc
* @license MIT
*/

/**
* Blocking direct access to the file
* @link https://goo.gl/wlRhOA
*/
defined( 'ABSPATH' ) or die( 'Armadillos like to swim, and they are very good at it. They have a strong dog paddle, and can even go quite a distance underwater, walking along the bottom of streams and ponds. They can hold their breath for four to six minutes at a time.' );

class HideWPVersion
{
  /** Number, modify this value but don't set it too high to prevent integer overflow
  * 4 digits should be satisfactory
  */
  const SEED = 1111;

  function __construct()
  {
    /** Modify WP core version */
    add_filter('style_loader_src', array($this,'modifyWPVersion'),9999);
    add_filter('script_loader_src', array($this,'modifyWPVersion'),9999);

    /** Remove generator meta tag with WP version from head and RSS */
    $this->removeGenerator();
  }

  /**
  * Multiply core version number by seed to bust cache on WP updates
  * @return string required
  */
  function modifyWPVersion($src){
    if(strpos( $src, 'ver='.get_bloginfo('version') )) {
      $ver = intval(str_replace(".", "", get_bloginfo('version') ));
      $src = remove_query_arg( 'ver', $src );
      $src.='?ver='.($ver * self::SEED);
    }
    return $src;
  }

  public function removeGenerator()
  {
    add_filter( 'the_generator', '__return_null' );
    remove_action('wp_head', 'wp_generator');
  }
}

return new HideWPVersion;
