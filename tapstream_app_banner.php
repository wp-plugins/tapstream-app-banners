<?php
/*
Plugin Name: Tapstream Smart App Banner Advertising
Plugin URI: https://tapstream.com/
Description: Enables Tapstream Smart App Banner advertising on all pages.
Version: 1.0.0
Author: Tapstream
Author URI: https://tapstream.com/

LICENSE:
GPLv2 or later, same as Wordpress
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function tapstream_app_banner() {
?>
    <script type="text/javascript">
        var ua = window.navigator.userAgent;
        var domain = window.location.hostname;
        var offer_js_url = "//management.tapstream.com/sab/offer.js?nc=" + (new Date()).getTime().toString() + "&domain=" + domain;

        if(ua.match(/ipad/i)){
            offer_js_url += "&device=ipad";
            document.write('<scr' + 'ipt src="' + offer_js_url + '"></scr' + 'ipt>');
        }else if(ua.match(/iphone/i) || ua.match(/ipod/i)){
            offer_js_url += "&device=iphone";
            document.write('<scr' + 'ipt src="' + offer_js_url + '"></scr' + 'ipt>');
        }
    </script>
<?php
}

if (!is_admin()) {
  add_action('wp_head', 'tapstream_app_banner', 0);
}
