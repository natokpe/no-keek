<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;
use NatOkpe\Wp\Theme\Keek\Utils\Clock;

add_filter('pre_get_document_title', function ($title) {
    return 'Verify Email';
}, 10, 3);

get_header();

?>

<div class="frame">
    <div class="frame-header">
    </div>

    <div class="frame-body d-md-flex flex-row justify-content-md-start align-items-md-stretch">
        <div class="row flex-grow-1 mx-0 g-0 align-items-md-stretch">
            <div class="col-md-6 col-lg-5 col-xl-4 d-md-flex flex-column justify-content-md-center">

                <div class="container mt-5 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-9 col-md-11 col-lg-10 col-xl-10 text-center">
                            <a class="d-inline-block" href="<?php echo home_url(); ?>">Keek Computers</a>
                        </div>
                    </div>
                </div>

                <div class="container mb-auto">
                    <div class="row justify-content-center">
                        <div class="col-10 col-sm-9 col-md-10 col-lg-10 col-xl-10">
                            <h2 class="mt-0 mb-5 p-0 pt-4 text-center">Account Created!</h2>

                            <h3>Verify Your Email</h3>
                            <div class="w-100 mt-4 text-start">
                                <p>We're excited to have you join us! We have sent a verification link to your email address. Click the link in the email to complete your sign up.</p>

                                <p><a href="#" tabindex="1" disabled><!-- <i class="fi fi-rr-rotate-right"></i>  -->Resend email</a></p>

                                <p class="mt-5">Having troubles? <a href="<?= get_page_link(Theme::page('contact')) ?>" tabindex="1">Get help</a></p>
                            </div>
                        </div>
                    </div>
                </div>
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
