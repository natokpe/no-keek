<?php
/**
 * Template Name: Courses
 */

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

Theme::add_body_classes('navbar-float');

get_header();

$query = new WP_Query([
    'post_type'           => 'course',
    'post_status'         => 'publish',
    'has_password'        => false,
    'ignore_sticky_posts' => false,
    'order'               => 'DESC',
    'orderby'             => 'date',
    'nopaging'            => true,
    'posts_per_page'      => 4,
    'paged'               => 1,
]);

?>

<div class="frame">
    <div class="frame-header">
        <?php get_template_part('tpl/parts/navbar'); ?>
    </div>

    <div class="frame-body">
        <div class="container">
            <div class="row gx-3 gy-4">
                <div class="col-12">
                    <nav class="breadcrumb">
                        <ol>
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <li>Courses</li>
                        </ol>
                    </nav>

                    <h1 class="page-heading">Courses</h1>
                </div>

<?php

foreach ($query->posts as $key => $course) {
    $course_image = has_post_thumbnail($course->ID) ? get_the_post_thumbnail_url($course->ID) : '';
    $course_url = get_the_permalink($course->ID);

?>
                <div class="col-6 col-sm-6 col-md-4 col-lg-3">

                    <div class="card card-border card-course">
                        <a class="card-image" href="<?php echo $course_url; ?>">
                            <img src="<?php echo $course_image; ?>" />
                        </a>
                        <a href="<?php echo $course_url; ?>" class="card-title d-flex align-items-end"><?php echo $course->post_title; ?></a>

                        <div class="p-3">
                            <span class="text-muted">16 Weeks &mdash; Advanced</span>
                        </div>

                        <div class="px-3 pb-3 text-center d-grid">
                            <a class="btn btn-medium" href="<?php echo $course_url; ?>">View Details</a>
                        </div>
                    </div>

                </div>

<?php

}

?>

                <div class="col-12">
                    <div class="d-flex justify-content-start mt-4">
                        <nav class="pagination">
                            <ul>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#"><i class="fi fi-rr-angle-left color-black"></i> Prev</a>
                                </li>
                                <li class="page-item current-page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item disabled"><a class="page-link" href="#">Next <i class="fi fi-rr-angle-right color-black"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container page-section subscribe">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <h2 class="section-heading">Stay in the Loop! Subscribe to our Newsletter</h2>
                    <p class="section-summary">Subscribe to our newsletter for exclusive offers, updates and insider tips.</p>
                </div>
                <div class="col-12 col-md-6">
                    <form class="my-4" action="#" method="POST">
                        <div class="form-container input-newsletter">
                            <input class="form-control" type="email" name="email" />
                            <button class="btn btn-primary btn-medium">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="frame-footer">
        <?php get_template_part('tpl/parts/footer'); ?>
    </div>

</div>

<?php

get_footer();
