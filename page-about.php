<?php
/**
 * Template Name: About
 */

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

while (have_posts()): the_post();

get_header();

?><div class="frame">
    <header class="frame-header">
        <?php get_template_part('tpl/parts/navbar'); ?>
        <?php get_template_part('tpl/parts/breadcrumb'); ?>
    </header>

    <main class="frame-body bg-white mt-5 py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-8">
                    <?php the_content(); ?>
                </div>
                <div class="col-md-5 col-lg-4">
                </div>
            </div>
        </div>
    </main>

    <footer class="frame-footer">
        <?php get_template_part('tpl/parts/footer'); ?>
    </footer>
</div>
<?php
get_footer();

endwhile;
