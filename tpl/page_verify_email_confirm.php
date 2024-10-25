<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;
use NatOkpe\Wp\Theme\Keek\User;

if (is_user_logged_in()) {
    if ((new User(wp_get_current_user()->ID))->emailVerified()) {
        wp_redirect(get_page_link(Theme::page('account')));
        exit;
    }
}

$verified = false;
$token    = Request::get('t', '');

if (empty($token)) {
    wp_redirect(home_url());
    exit;
}

$token = Theme::base64_url_decode($token);
$token = is_string($token) ? explode('|', $token) : null;

if (is_array($token) && (count($token) === 2)) {
    if (ctype_digit($token[0]) && (strlen($token[1]) === 6)) {
        $user = new WP_User((int) $token[0]);
        if ($user->exists() && (new User($user->ID))->verifyEmail($token[1])) {
            $verified = true;
        }
    }
}

add_filter('pre_get_document_title', function ($title) use ($verified) {
    return $verified ? 'Email Verification Successful' : 'Email Verification Failed';
}, 10, 3);

get_header();

?>

<div class="frame">
    <div class="frame-header">
        <div class="navbar">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="d-flex align-items-center justify-content-between w-100">

                            <a class="navbar-brand" href="<?= home_url() ?>">
                                <img src="" alt="Keek Computers" />
                            </a>

                            <div class="m-0 p-0 d-inline-block">
                                <div class="navbar-action8">
                                    <a href="<?= home_url() ?>">Go to Home</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="frame-body">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-sm-9 col-md-7 col-lg-6 col-xl-5">

                    <h2 class="mt-5 mb-4 pt-3 text-center"><?= ($verified ? 'Email Verified!' : 'Email Verification Failed') ?></h2>

                    <div class="pt-3 text-center">
                        <p><?= ($verified ? 'You have successfully verified your email.' : 'The link may have expired or is invalid.') ?></p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="frame-footer">
        <div class="mt-5"></div>
    </div>

    <div class="frame-footer">
    </div>

</div>

<?php

get_footer();
