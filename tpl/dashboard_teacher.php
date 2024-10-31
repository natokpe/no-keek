<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

if (! is_user_logged_in()) {
    wp_redirect(get_page_link(Theme::page('login')));
    exit;
}

add_filter('pre_get_document_title', function ($title) {
    return 'Dashboard';
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
                    <h1 class="mb-5">Dashboard</h1>
                </div>
            </div>

        </div>
    </div>

    <div class="frame-footer">
    </div>

</div>

<?php

get_footer();
