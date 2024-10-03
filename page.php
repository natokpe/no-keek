<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

get_header();

?>

<div class="frame">
    <header class="frame-header">
        <?php get_template_part('tpl/parts/navbar'); ?>
    </header>

    <main class="frame-body">
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
