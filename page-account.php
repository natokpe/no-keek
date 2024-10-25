<?php
/**
 * Template Name: Account
 */
 
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;

if (! is_user_logged_in()) {
    wp_redirect(get_page_link(Theme::page('login')));
    exit;
}

$user = wp_get_current_user();

wp_redirect(Theme::startPage($user->roles));
