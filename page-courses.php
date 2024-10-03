<?php
/**
 * Template Name: Courses
 */

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

Theme::add_body_classes('navbar-float');

get_header();

?>

<div class="frame">
    <div class="frame-header">
        <?php get_template_part('tpl/parts/navbar'); ?>
    </div>

    <div class="frame-body">
    </div>

    <div class="frame-footer">
        <?php get_template_part('tpl/parts/footer'); ?>
    </div>

</div>

<?php

get_footer();
