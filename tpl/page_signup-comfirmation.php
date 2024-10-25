<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;
use NatOkpe\Wp\Theme\Keek\Utils\Clock;

add_filter('pre_get_document_title', function ($title) {
    return 'Account Created';
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

                    <h2 class="mt-5 mb-4 pt-3 text-center">Account Created!</h2>

                    <div class="pt-3">
                        <h3 class="card-title text-start">Verification Email Sent</h3>
                        <p>We have sent a verification link to your email address. Click the link in the email to complete your sign up.</p>

                        <p><a href="#" tabindex="1" disabled="disabled">Resend email</a></p>

                        <p class="mt-5">Having troubles? <a href="<?= get_page_link(Theme::page('contact')) ?>" tabindex="1">Get help</a></p>
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
