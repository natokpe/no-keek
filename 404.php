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
        <div class="container my-5 py-5 text-center">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title">404</h1>
                    <p>Page Not Fount</p>
                </div>
            </div>
        </div>
    </div>

    <div class="frame-footer">
        <?php // get_template_part('tpl/parts/footer'); ?>
    </div>

</div>

<?php

get_footer();
