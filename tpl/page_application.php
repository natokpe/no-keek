<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Request;
use NatOkpe\Wp\Theme\Keek\Utils\Clock;

add_filter('pre_get_document_title', function ($title) {
    return 'Complete Your Application';
}, 10, 3);

Theme::add_body_classes('navbar-float, navbar-blank');

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
                <div class="col-10 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                    <h2 class="mt-5 mb-4 pt-3 text-center">Complete Your Application</h2>

                    <p class="text-center">Ut proident exercitation dolor velit pariatur duis excepteur quis ut deserunt et labore magna minim.</p>

                    <nav class="steps steps-h mt-5">
                        <ol>
                            <li class="steps-item step-success">
                                <div class="step">
                                    <div class="step-status">
                                        <div class="step-status-indicator"></div>
                                    </div>
                                    <div class="step-summary">
                                        <div class="step-title">Personal Info</div>
                                        <div class="step-desc"></div>
                                    </div>
                                    <div class="step-action">
                                        <a href="./onboarding-personal.html" tabindex="1">Edit</a>
                                    </div>
                                </div>
                            </li>

                            <li class="steps-item step-success">
                                <div class="step">
                                    <div class="step-status">
                                        <div class="step-status-indicator"></div>
                                    </div>
                                    <div class="step-summary">
                                        <div class="step-title">Contact Details</div>
                                    </div>
                                    <div class="step-action">
                                        <a href="./onboarding-contact.html" tabindex="1">Edit</a>
                                    </div>
                                </div>
                            </li>

                            <li class="steps-item">
                                <a class="step" href="./onboarding-education.html" tabindex="1">
                                    <div class="step-status">
                                        <div class="step-status-indicator"></div>
                                    </div>
                                    <div class="step-summary">
                                        <div class="step-title">Education</div>
                                    </div>
                                </a>
                            </li>

                            <li class="steps-item">
                                <div class="step">
                                    <div class="step-status">
                                        <div class="step-status-indicator"></div>
                                    </div>
                                    <div class="step-summary">
                                        <div class="step-title">Employment</div>
                                    </div>
                                </div>
                            </li>

                            <li class="steps-item">
                                <div class="step">
                                    <div class="step-status">
                                        <div class="step-status-indicator"></div>
                                    </div>
                                    <div class="step-summary">
                                        <div class="step-title">Apply</div>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    <div class="mt-4">
                        <a class="btn btn-primary w-100" href="./onboarding-personal.html" tabindex="1">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="frame-footer">
        <div class="mt-5"></div>
    </div>
</div>

<?php

get_footer();
