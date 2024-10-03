<?php
declare(strict_types = 1);

require_once 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Config;

// define( 'WP_DEBUG', true );
// define( 'WP_DEBUG_LOG', true );
// define( 'WP_DEBUG_DISPLAY', true );
// define( 'SCRIPT_DEBUG', false );
// define( 'WPCF7_AUTOP', false );
// define( 'WP_ALLOW_REPAIR', true );

if (WP_DEBUG === true) {
    ini_set("xdebug.var_display_max_depth", "-1");
    ini_set("xdebug.var_display_max_children", "-1");
    ini_set("xdebug.var_display_max_data", "-1");
    ini_set("display_errors", "1");
}

ini_set("upload_max_size", "1024M");
ini_set("post_max_size", "1024M");
ini_set("max_execution_time", "300");

$config = new Config([
]);

$theme = new Theme($config->close());
$theme->start();

// info@keekcomputers.com.ng 262587d1-E495-4ce0-82C0-506ECf170c91