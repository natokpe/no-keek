<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

if (! is_user_logged_in()) {
    wp_redirect(get_page_link(Theme::page('login')));
    exit;
}

add_filter('pre_get_document_title', function ($title) {
    return 'My Profile';
}, 10, 3);

Theme::add_body_classes(
    'navbar-float',
    'navbar-teacher',
    'sidebar-float',
    'bg-grey'
);

$user = wp_get_current_user();

get_header();

?>

<div class="frame">
    <div class="frame-header">
        <?php get_template_part('tpl/parts/nav-teacher'); ?>
    </div>

    <div class="frame-body">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-5">My Profile</h1>
                </div>
            </div>

            <div class="row gx-3 gy-3">
                <div class="col-lg-5 col-xl-4">
                    <div class="card card-border">
                        <div class="card-body">
                            <div class="user-profile-photo">
                                <div class="user-profile-photo-image">
                                    <img src="" />
                                </div>
                            </div>
                            <div class="user-profile-name text-center">
                                <?php echo get_user_meta($user->ID, 'tmp_full_name', true); ?>
                            </div>
                            <div class="user-profile-role text-center">
                                Teacher
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>

                <div class="col-lg-7 col-xl-8">
                    <div class="card card-border mb-3">
                        <div class="card-header">
                            <h2 class="card-title">Personal Info</h2>
                        </div>
                        <div class="card-body">

                            <ul class="user-details">
                                <li class="user-details-item">
                                    <span class="user-details-item-name">Full Name</span>
                                    <span class="user-details-item-value"><?php echo get_user_meta($user->ID, 'tmp_full_name', true); ?></span>
                                </li>

                                <li class="user-details-item">
                                    <span class="user-details-item-name">Gender</span>
                                    <span class="user-details-item-value"><?php echo get_user_meta($user->ID, 'tmp_gender', true); ?></span>
                                </li>

                                <li class="user-details-item">
                                    <span class="user-details-item-name">Date of Birth</span>
                                    <span class="user-details-item-value"></span>
                                </li>

                                <li class="user-details-item">
                                    <span class="user-details-item-name">Marital Status</span>
                                    <span class="user-details-item-value"></span>
                                </li>
                            </ul>

                        </div>
                    </div>

                    <div class="card card-border mb-3">
                        <div class="card-header">
                            <h2 class="card-title">Contact Details</h2>
                        </div>
                        <div class="card-body">
                            <ul class="user-details">
                                <li class="user-details-item">
                                    <span class="user-details-item-name">Email Address</span>
                                    <span class="user-details-item-value"><?php echo $user->user_email; ?></span>
                                </li>

                                <li class="user-details-item">
                                    <span class="user-details-item-name">Phone</span>
                                    <span class="user-details-item-value"><?php echo get_user_meta($user->ID, 'tmp_phone', true); ?></span>
                                </li>

                                <li class="user-details-item">
                                    <span class="user-details-item-name">WhatsApp</span>
                                    <span class="user-details-item-value"></span>
                                </li>

                                <li class="user-details-item">
                                    <span class="user-details-item-name">Telegram</span>
                                    <span class="user-details-item-value"></span>
                                </li>

                                <li class="user-details-item">
                                    <span class="user-details-item-name">LinkedIn</span>
                                    <span class="user-details-item-value"></span>
                                </li>

                                <li class="user-details-item">
                                    <span class="user-details-item-name">Facebook</span>
                                    <span class="user-details-item-value"></span>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="frame-footer">
    </div>

</div>

<?php

get_footer();
