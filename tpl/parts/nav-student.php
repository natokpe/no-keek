<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

$user = wp_get_current_user();

get_header();

?>

<div class="navbar">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="d-flex align-items-center justify-content-between w-100">

                    <a class="navbar-brand" href="<?= home_url() ?>">
                        <img src="" alt="Keek Computers" />
                    </a>

                    <div class="m-0 p-0 d-inline-flex align-items-center">
                        <button class="navbar-notif-toggle">
                            <i class="fi fi-rr-bell"></i>
                        </button>

                        <button class="navbar-nav-toggle-icon d-lg-none ms-3">
                            <img src="" />
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- <div class="navbar-notifications-overlay"></div> -->
<div class="navbar-notifications">
    <div class="navbar-notifications-header">
        <h3 class="navbar-notifications-title">Notifications</h3>
        <button class="navbar-notifications-close"><i class="fi fi-rr-circle-xmark"></i></button>
    </div>

    <div class="navbar-notifications-body">
    </div>

    <div class="navbar-notifications-footer">
        <button class="navbar-notifications-action">Mark All as Read</button>
    </div>
</div>

<div class="navbar-drawer">
    <div class="profile-card-wrapper">
        <a class="profile-card" href="<?= get_page_link(Theme::page('profile')) ?>">
            <div class="profile-card-image">
                <img src="" />
            </div>
            <div class="profile-card-summary">
                <div class="profile-card-name"><?php echo get_user_meta($user->ID, 'tmp_full_name', true); ?></div>
                <div class="profile-card-role">Student</div>
            </div>
        </a>

        <div class="profile-card-separator"></div>
    </div>
    <nav class="navbar-drawer-nav">
        <ul class="navbar-drawer-nav-menu">

            <li class="menu-item current-menu-item">
                <a class="menu-link" href="<?= get_page_link(Theme::page('profile')) ?>">
                    <span class="menu-item-icon"><i class="fi fi-rr-user"></i></span>
                    <span class="menu-item-label">My Profile</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?= home_url() ?>">
                    <span class="menu-item-icon"><i class="fi fi-rr-home"></i></span>
                    <span class="menu-item-label">Home</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?= get_page_link(Theme::page('list-courses')) ?>">
                    <span class="menu-item-icon"><i class="fi fi-rr-apps"></i></span>
                    <span class="menu-item-label">Explore Courses</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?= get_page_link(Theme::page('student-courses')) ?>">
                    <span class="menu-item-icon"><i class="fi fi-rr-book-alt"></i></span>
                    <span class="menu-item-label">My Courses</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?= get_page_link(Theme::page('student-assessments')) ?>">
                    <span class="menu-item-icon"><i class="fi fi-rr-test"></i></span>
                    <span class="menu-item-label">Assessments</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?= get_page_link(Theme::page('student-reports')) ?>">
                    <span class="menu-item-icon"><i class="fi fi-rr-chart-pie-alt"></i></span>
                    <span class="menu-item-label">Reports</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?= get_page_link(Theme::page('student-certs')) ?>">
                    <span class="menu-item-icon"><i class="fi fi-rr-diploma"></i></span>
                    <span class="menu-item-label">Certificates</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="<?= get_page_link(Theme::page('settings')) ?>">
                    <span class="menu-item-icon"><i class="fi fi-rr-settings"></i></span>
                    <span class="menu-item-label">Settings</span>
                </a>
            </li>

        </ul>
    </nav>

    <div class="navbar-drawer-action">
        <a href="<?= wp_logout_url(get_page_link(Theme::page('login'))) ?>">Logout <i class="fi fi-rr-exit"></i></a>
    </div>
</div>