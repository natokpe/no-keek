<?php
/**
 * Template Name: Login
 */

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;

$screen = Request::get('action');

switch ($screen) {
    case 'recover-password':
        $tpl = 'tpl/page_forgot-password';
        break;

    case 'reset-password':
        $tpl = 'tpl/page_reset-password';
        break;

    case 'login':
        default:
        $tpl = 'tpl/page_login';
        break;
}

get_template_part($tpl);
