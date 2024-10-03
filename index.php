<?php
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
<?php
get_template_part('tpl/parts/home_hero');
get_template_part('tpl/parts/home_intro');
get_template_part('tpl/parts/home_services');
get_template_part('tpl/parts/home_features');
get_template_part('tpl/parts/home_courses');
get_template_part('tpl/parts/home_stat');
get_template_part('tpl/parts/home_faq');
get_template_part('tpl/parts/home_cta');
get_template_part('tpl/parts/home_subscribe');
?>
    </div>

    <div class="frame-footer">
        <?php get_template_part('tpl/parts/footer'); ?>
    </div>

</div>

<?php

get_footer();
