<?php

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

?>

<!-- Hero - Get started - how it works -->
<div class="container-fluid g-0 page-section hero">
    <div class="row align-items-center">
        <div class="col-lg-1"></div>
        <div class="col-12 col-lg-5">
            <div class="container my-5">
                <div class="row">
                    <div class="col-12">
                        <h1>Level Up Your Career. Learn New Skills And Achieve Your Goals Faster.</h1>
                        <p class="section-summary">Combining online and offline learning, our platform offers comprehensive learning paths, engaging content and interactive assessments.</p>
                        <div class="w-100 mt-5">
                            <a class="btn btn-primary btn-large" href="<?= get_page_link(Theme::page('register')) ?>">Get Started</a>
                            <a class="btn btn-large ms-3" href="<?php echo home_url('/how-it-works'); ?>">How it Works</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="hero-media">
                <img src="<?php echo Theme::url('assets/img/hero.jpg'); ?>" />
            </div>
        </div>
    </div>
</div>
