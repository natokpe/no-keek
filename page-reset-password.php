<?php
/**
 * Template Name: Reset Password
 */

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Config;
use NatOkpe\Wp\Theme\Keek\Utils\Request;

if (is_user_logged_in()) {
    // TODO: prevent loop back
    wp_redirect(get_page_link(Theme::page('account')));
    exit;
}

add_filter('pre_get_document_title', function ($title) {
    return 'Reset Password';
}, 10, 3);

$do_reset      = false;
$screen        = 'initial';
$screen_errors = [];
$reset_token   = Request::get('t', null);
$nonce_id      = 'password_reset_form_' . get_the_ID();
$form          = [
    'password'  => Request::post('pwd', ''),
    'vpassword' => Request::post('vpwd', ''),
    'nonce'     => Request::post('vtkn', ''),
];

if (isset($reset_token)) {
    $reset_token = Theme::base64_url_decode($reset_token);

    if ($reset_token !== false) {
        $reset_token = explode('||', $reset_token);
    }

    if (count($reset_token) === 2) {
        $reset_token = [
            'user' => $reset_token[0],
            'key'  => $reset_token[1],
        ];

        $user = new WP_USER((int) $reset_token['user']);

        if ($user->exists()) {
            $user     = check_password_reset_key($reset_token['key'], $user->user_login);
            $do_reset = $user instanceOf WP_USER;
        }
    }
}

if ($do_reset) {
    $screen = 'reset';

    if (Request::is_post()) {
        if (wp_verify_nonce($form['nonce'], $nonce_id)) {

            if (empty($form['password'])) {
                $do_reset = false;
                $form_errors['password'] = 'Choose a password.';
            }

            if ($form['vpassword'] !== $form['password']) {
                $do_reset = false;
                $form_errors['vpassword'] = 'Passwords do not match.';
            }

            if ($do_reset) {
                reset_password($user, $form['password']);
                // TODO: invalidate activation key
                $screen = 'complete';
            }
        } else {
            $do_reset = false;
            $screen_errors['general'] = 'An error occurred. Please refresh the page and try again.';
        }
    }
}

get_header();

?>

<div class="frame">
    <div class="frame-header">
    </div>

    <div class="frame-body d-md-flex flex-row justify-content-md-start align-items-md-stretch">
        <div class="row flex-grow-1 mx-0 g-0 align-items-md-stretch">
            <div class="col-md-6 col-lg-5 col-xl-4 d-md-flex flex-column justify-content-md-center">

                <div class="container mt-5 mb-5 mb-md-5">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-9 col-md-11 col-lg-10 col-xl-10 text-center">
                            <a class="d-inline-block" href="<?php echo home_url(); ?>">Keek Computers</a>
                        </div>
                    </div>
                </div>

                <div class="container my-auto">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-9 col-md-10 col-lg-10 col-xl-10">
<?php

switch ($screen) {
    case 'reset':

?>
                            <h2 class="mt-0 mb-5 p-0 text-center">Reset Password</h2>

                            <form class="w-100" method="POST" action="<?= get_page_link(Theme::page('reset-password')) ?>">
                                <div class="mb-3">
                                    <label class="form-label" for="form-login-password">New Password</label>
                                    <input id="form-login-password"
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        tabindex="1"
                                        value="<?= $form['password'] ?>"
                                    />
                                </div>

                                <div class="mb-4">
                                    <label class="form-label" for="form-login-password">Confirm Password</label>
                                    <input id="form-login-password"
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        tabindex="1"
                                        value="<?= $form['vpassword'] ?>"
                                    />
                                </div>

                                <input type="hidden"
                                    hidden="hidden"
                                    name="vtkn"
                                    value="<?= wp_create_nonce($nonce_id); ?>" 
                                />

                                <div>
                                    <button class="btn btn-primary w-100" type="submit" tabindex="1">Reset</button>
                                </div>
                            </form>

<?php

        break;

    case 'complete':

?>

                            <h2 class="mt-0 mb-5 p-0 text-center">Password Reset Successful</h2>
                            <p>Your password has been reset. You can login using the new password.</p>

<?php

        break;

    case 'initial':
        default:

?>

                            <h2 class="mt-0 mb-5 p-0 text-center">Reset Password</h2>
                            <p>Sorry! This link may have expired and can not be used.</p>
<?php
        break;
}

?>
                            <div class="w-100 mt-4">
                                <div class="w-100 text-start">
                                    <a href="<?= get_page_link(Theme::page('login')) ?>" tabindex="2"><i class="fi fi-rr-angle-left color-black" style="font-size: 0.7rem;"></i> back to login</a>
                                </div>

                                <p><a href="<?= get_page_link(Theme::page('contact')) ?>" tabindex="2">I need more help</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-100 mt-5"></div>
            </div>
            <div class="col-md-6 col-lg-7 col-xl-8 d-none d-md-flex align-items-stretch">
                <div class="media-column-img w-100 flex-grow-1 d-flex align-items-stretch" style="background-image: url('<?= Theme::url('assets/img/media-col.jpg') ?>');">
                    <div class="opacity-25 w-100 flex-grow-1"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="frame-footer">
    </div>

</div>

<?php

get_footer();
