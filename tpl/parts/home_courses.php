<?php

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

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

<!-- Course highlight -->
<div class="container page-section courses">
    <div class="row gx-3 gy-3">
        <div class="col-12">
            <h2 class="section-heading">Browse Courses</h2>
        </div>
<?php

foreach ($query->posts as $key => $course) {
    $course_image = has_post_thumbnail($course->ID) ? get_the_post_thumbnail_url($course->ID) : '';
    $course_url = get_the_permalink($course->ID);

?>
        <div class="col-6 col-sm-6 col-md-4 col-lg-3">

            <div class="card card-border card-course">
                <a class="card-image" href="<?php echo $course_url; ?>">
                    <img src="<?php echo $course_image; ?>" style="height: 100%;" />
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
            <div class="d-flex justify-content-center mt-4">
                <a class="btn btn-medium mx-2" href="<?php echo get_page_link(Theme::page('list-courses')); ?>">See More</a>
            </div>
        </div>
    </div>
</div>
