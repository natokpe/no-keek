<?php
/**
 * Template Name: Forgot Password
 */

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;

if (is_user_logged_in()) {
    // TODO: prevent loop back
    wp_redirect(get_page_link(Theme::page('account')));
    exit;
}

add_filter('pre_get_document_title', function ($title) {
    return 'Forgot Password';
}, 10, 3);

$user          = wp_get_current_user();
$redir         = null;
$screen_errors = [];
$nonce_id      = 'user_recover_password_form';
$form          = [
    'email' => Request::post('email', ''),
    'nonce' => Request::post('vtkn', ''),
];

if ((! is_user_logged_in()) && Request::is_post()) {
    if (wp_verify_nonce($form['nonce'], $nonce_id)) {
        // $user = get_user_by_email($form['nonce']);

        if ($user instanceOf WP_User) {
            // retrieve_password(wp_get_current_user()->user_login)

            // if (is_wp_error($user)) {
            //     $screen_errors[] = $user->get_error_message();
            // }
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
                            <h2 class="mt-0 mb-5 p-0 text-center">Forgot Password</h2>

                            <p class="mt-0 mb-4 p-0">Enter the email you used to create your account so we can send you instructions on how to reset your password.</p>

                            <form class="w-100" method="POST" action="<?= get_page_link(Theme::page('recover-password')) ?>">
                                <div class="mb-4">
                                    <label class="form-label" for="form-user-email">Email</label>
                                    <input id="form-user-email"
                                        class="form-control"
                                        type="email"
                                        name="email"
                                        tabindex="1"
                                        placeholder=""
                                        value="<?= $form['email'] ?>"

                                    />
                                </div>

                                <input type="hidden"
                                    hidden="hidden"
                                    name="vtkn"
                                    value="<?= wp_create_nonce($nonce_id); ?>" 
                                />

                                <div>
                                    <button class="btn btn-primary w-100" type="submit" tabindex="1">Send</button>
                                </div>
                            </form>

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
