<?php
/**
 * Template Name: Sign Up
 */
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;
use NatOkpe\Wp\Theme\Keek\Utils\Clock;

add_filter('pre_get_document_title', function ($title) {
    return 'Sign Up';
}, 10, 3);

$signon        = null;
$redir         = null;
$nonce_id      = 'user_signup_form';
$do_signup     = null;
$screen_errors = [];
$form          = [
    'email'     => Request::post('email', ''),
    'password'  => Request::post('password', ''),
    'vpassword' => Request::post('vpassword', ''),
    'terms'     => Request::post('terms', null) === 'on',
    'nonce'     => Request::post('vtkn', ''),
];

if ((! is_user_logged_in()) && Request::is_post()) {
    $do_signup = 0;

    if (! wp_verify_nonce($form['nonce'], $nonce_id)) {
        $do_signup++;
        $screen_errors['general'] = 'An error occurred. Please refresh the page and try again.';
    }

    // if (getmxrr($form['email'])) {}
    if (! filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $do_signup++;
        $screen_errors['email'] = 'Enter a valid email.';
    }

    if (empty($form['password'])) {
        $do_signup++;
        $screen_errors['password'] = 'Choose a password.';
    }

    if ($form['vpassword'] !== $form['password']) {
        $do_signup++;
        $screen_errors['vpassword'] = 'Passwords do not match.';
    }

    if ($form['terms'] !== true) {
        $do_signup++;
        $screen_errors['terms'] = 'You must accept the terms.';
    }

    if ($do_signup === 0) {
        $signon = wp_insert_user([
            'user_pass'            => $form['password'],
            'user_login'           => $form['email'],
            'user_email'           => $form['email'],
            'show_admin_bar_front' => false,
            'role'                 => 'student',
        ]);
    }

    if (is_int($signon)) {
        $redir = add_query_arg(
            [
                'action' => Theme::base64_url_encode(
                    implode('|', [
                        'verify_email',
                        wp_create_nonce('signup_verify_email_' . $signon),
                        $signon,
                    ])
                ),
            ],
            get_page_link(Theme::page('register'))
        );
    } else {
        $do_signup++;
        $screen_errors['general'] = 'An error occurred. Please try again later.';
    }
}

if (is_user_logged_in()) {
    $redir = home_url();

    if (in_array('student', $user->roles)) {
        $redir = get_page_link(Theme::page('dashboard-student'));
    }

    if (in_array('teacher', $user->roles)) {
        $redir = get_page_link(Theme::page('dashboard-teacher'));
    }

    if (count(array_intersect($user->roles, [
        'administrator',
        'hrm',
        'accountant',
    ])) > 0) {
        $redir = get_admin_url();
    }
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
                            <h2 class="mt-0 mb-5 p-0 text-center">Create an account</h2>

                            <form class="w-100" method="POST" action="<?= get_page_link(Theme::page('register')) ?>">
                                <div class="mb-3">
                                    <label class="form-label" for="form-signup-email">Email</label>
                                    <input id="form-signup-email"
                                        class="form-control"
                                        type="email"
                                        name="email"
                                        minlength="3"
                                        required="required"
                                        maxlength="80"
                                        tabindex="1"
                                        placeholder=""
                                        value="<?= $form['email'] ?>"
                                    />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="form-signup-password">Password</label>
                                    <input id="form-signup-password"
                                        class="form-control"
                                        type="password"
                                        name="password"
                                        required="required"
                                        minlength="8"
                                        maxlength="50"
                                        tabindex="1"
                                        placeholder=""
                                        value="<?= $form['password'] ?>"
                                    />
                                </div>

                                <div class="mb-1">
                                    <label class="form-label" for="form-signup-vpassword">Confirm Password</label>
                                    <input id="form-signup-vpassword"
                                        class="form-control"
                                        type="password"
                                        name="vpassword"
                                        required="required"
                                        minlength="8"
                                        maxlength="50"
                                        tabindex="1"
                                        value="<?= $form['vpassword'] ?>" 
                                        placeholder=""
                                    />
                                </div>

                                <div class="mb-4">
                                    <input id='form-signup-terms'
                                        class="form-control"
                                        type='checkbox'
                                        tabindex="1"
                                        name="terms"
                                        required="required"
                                        value="on"
                                        <?php echo ($form['terms'] ? ' checked="checked"' : ''); ?>
                                    />
                                    <label for='form-signup-terms'>I accept the <a href="<?= get_page_link(Theme::page('terms')) ?>" tabindex="3">Terms and Conditions</a> and <a href="<?= get_page_link(Theme::page('policy')) ?>" tabindex="3">Privacy Policy</a>.</label>
                                </div>

                                <input type="hidden"
                                    hidden="hidden"
                                    name="vtkn"
                                    value="<?= wp_create_nonce($nonce_id); ?>" 
                                />

                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit" tabindex="1">Sign Up</button>
                                </div>
                            </form>

                            <div class="w-100 mt-4">
                                <div class="w-100 text-start">
                                    <a href="<?= get_page_link(Theme::page('login')) ?>" tabindex="2">Log in</a>
                                </div>

                                <p>Having troubles? <a href="<?= get_page_link(Theme::page('contact')) ?>" tabindex="2">Get help</a></p>
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
