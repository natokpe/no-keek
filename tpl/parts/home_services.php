<?php

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

?>

<!-- Services / What we do -->
<div class="container page-section page-section-service">
    <div class="row align-items-center g-lg-4">
        <div class="col-12 col-lg-6 text-center text-lg-start">
            <h2 class="section-heading">Our Advantage</h2>
            <h3 class="section-title">Dolor occaecat et ad adipisicing elit quis eu reprehenderit eiusmod sunt anim aute.</h3>
            <p class="section-summary">Cillum consequat mollit occaecat. Id nostrud id officia duis pariatur ea nostrud ea mollit fugiat enim irure magna incididunt et aliqua mollit.</p>
            <div class="mt-4 mb-4 mb-lg-0 text-lg-left">
                <a href="<?php echo home_url('/#'); ?>" class="btn btn-black btn-medium">Learn More</a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="page-section-service-item d-flex">
                <img src="<?php echo Theme::url('assets/img/s1.jpg'); ?>" />
                <a href="<?php echo home_url('/#'); ?>">
                    <i class="item-icon fi fi-rr-interactive"></i>
                    <h3>Nulla laboris ex Cillum consequat mollit occaecat</h3>
                </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="page-section-service-item d-flex">
                <img src="<?php echo Theme::url('assets/img/s2.jpg'); ?>" />
                <a href="<?php echo home_url('/#'); ?>">
                    <i class="item-icon fi fi-rr-magnet-user"></i>
                    <h3>Nulla laboris ex Cillum consequat mollit occaecat</h3>
                </a>
            </div>
        </div>
    </div>
</div>
