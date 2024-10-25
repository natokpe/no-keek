<?php
/**
 * Template Name: Login
 */

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;

add_filter('pre_get_document_title', function ($title) {
    return 'Login';
}, 10, 3);

$user          = wp_get_current_user();
$redir         = null;
$screen_errors = [];
$nonce_id      = 'user_login_form';
$form          = [
    'email'    => Request::post('email', ''),
    'password' => Request::post('password', ''),
    'rem'      => Request::post('rem', null) === 'on',
    'nonce'    => Request::post('vtkn', ''),
];

if ((! is_user_logged_in()) && Request::is_post()) {
    if (wp_verify_nonce($form['nonce'], $nonce_id)) {
        $user = wp_signon([
            'user_login'    => $form['email'],
            'user_password' => $form['password'],
            'remember'      => $form['rem'],
        ], is_ssl());

        if ($user instanceOf WP_USER) {
            wp_set_current_user($user->ID, $user->user_login);
        }

        if (is_wp_error($user)) {
            $screen_errors[] = $user->get_error_message();
        }
    }
}

if (is_user_logged_in()) {
    $redir = get_page_link(Theme::page('account'));
}

if (isset($redir)) {
    wp_redirect($redir);
    exit;
}

get_header();

?><div class="frame">
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
                            <h2 class="mt-0 mb-5 p-0 text-center">Welcome, Sign in</h2>

                            <form class="w-100" method="POST" action="<?= get_page_link(Theme::page('login')) ?>">
                                <div class="mb-3">
                                    <label class="form-label" for="form-login-email">Email</label>
                                    <input id="form-login-email"
                                        class="form-control"
                                        type="email"
                                        name="email"
                                        tabindex="1"
                                        placeholder=""
                                        required="required"
                                        value="<?= $form['email'] ?>"
                                    />
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="form-login-password">Password</label>
                                    <input id="form-login-password"
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        tabindex="1"
                                        placeholder=""
                                        value="<?= $form['password'] ?>"
                                    />
                                    <div class="text-end mt-2 w-100">
                                        <a href="<?= get_page_link(Theme::page('recover-password')) ?>" tabindex="2">Forgot password?</a>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <input id='form-login-rem'
                                        class="form-control"
                                        type='checkbox'
                                        tabindex="1"
                                        name="rem"
                                        value="on"
                                        <?php echo ($form['rem'] ? 'checked="checked"' : ''); ?>
                                    />
                                    <label for='form-login-rem'>Keep me logged in</label>
                                </div>

                                <input type="hidden"
                                    hidden="hidden"
                                    name="vtkn"
                                    value="<?= wp_create_nonce($nonce_id); ?>" 
                                />

                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit" tabindex="1">Sign in</button>
                                </div>
                            </form>

                            <div class="w-100 mt-4">
                                <div class="w-100 text-start">
                                    <a href="<?= get_page_link(Theme::page('register')) ?>" tabindex="2">Create an account</a>
                                </div>

                                <p>Unable to login? <a href="<?= get_page_link(Theme::page('help')) ?>" tabindex="2">Get help</a></p>
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

</div><?php
get_footer();
