<?php
/**
 * Template Name: Account
 */
 
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\EmailAccount;
use NatOkpe\Wp\Theme\Keek\EmailTemplate;
use NatOkpe\Wp\Theme\Keek\Utils\Request;

$screen = null;

if (! empty(Request::get('action', ''))) {
    $token = Theme::base64_url_decode(Request::get('action'));
    $token = is_string($token) ? explode('|', $token) : null;

    if (is_array($token) && (count($token) === 3)) {
        switch ($token[0]) {
            case 'verify_email':
                if (wp_verify_nonce($token[1], 'signup_verify_email_' . $token[2])) {
                    $usr = new WP_User((int) $token[2]);
                    if ($usr->exists() && empty(get_user_meta($usr->ID, 'email_verified', true))) {

                        do_action('email_verification', $usr->user_email, $usr);

                        $screen = 'verify_email';
                    }
                }
                break;
        }
    }
}

switch ($screen) {
    case 'verify_email':
        $tpl = 'tpl/page_signup-verify-email';
        break;

    case 'signup':
        default:
        $tpl = 'tpl/page_signup';
        break;
}

get_template_part($tpl);
