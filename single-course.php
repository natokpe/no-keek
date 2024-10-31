<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

Theme::add_body_classes('navbar-float');

get_header();

while (have_posts()):
    the_post();

    $course       = get_post(get_the_ID());
    $course_image = has_post_thumbnail() ? get_the_post_thumbnail_url() : '';
    $course_url   = get_the_permalink();

?>

<div class="frame">
    <div class="frame-header">
        <?php get_template_part('tpl/parts/navbar'); ?>
    </div>

    <div class="frame-body">
        <div class="container">
            <div class="row gx-3 gy-4">
                <div class="col-md-7 col-lg-8 col-xl-8">

                    <div class="row">
                        <div class="col-12">
                            <nav class="breadcrumb">
                                <ol>
                                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                                    <li><a href="<?php echo get_page_link(Theme::page('list-courses')); ?>">Courses</a></li>
                                    <li><?php echo $course->post_title; ?></li>
                                </ol>
                            </nav>

                            <!-- <div class="page-category">Course</div> -->
                            <h1 class="page-heading"><?php echo $course->post_title; ?></h1>

                            Advanced
                            16 Weeks
                        </div>

                        <div class="col-12">

                            <div class="course-image mt-5">
                                <img src="<?php echo $course_image; ?>" />
                            </div>

                            <div>
                                <h2 class="mt-5">Overview</h2>
                                <!-- <div>
                                    <p>Sint amet aute aliqua cupidatat anim in sed velit aliquip non adipisicing velit elit id dolore elit laborum nostrud amet velit sit amet voluptate.</p>
                                    <p>Sint amet aute aliqua cupidatat anim in sed velit aliquip non adipisicing velit elit id dolore elit laborum nostrud amet velit sit amet voluptate.</p>
                                    <p>Sint amet aute aliqua cupidatat anim in sed velit aliquip non adipisicing velit elit id dolore elit laborum nostrud amet velit sit amet voluptate.</p>
                                    <p>Sint amet aute aliqua cupidatat anim in sed velit aliquip non adipisicing velit elit id dolore elit laborum nostrud amet velit sit amet voluptate.</p>
                                </div> -->

                                <h2 class="mt-5">What You Will Learn</h2>
                                <!-- <div>
                                    <p>Sint amet aute aliqua cupidatat anim in sed velit aliquip non adipisicing velit elit id dolore elit laborum nostrud amet velit sit amet voluptate.</p>
                                    <p>Sint amet aute aliqua cupidatat anim in sed velit aliquip non adipisicing velit elit id dolore elit laborum nostrud amet velit sit amet voluptate.</p>
                                </div> -->

                                <h2 class="mt-5">Prerequisites</h2>
                                <!-- <div>
                                    <p>Sint amet aute aliqua cupidatat anim in sed velit aliquip non adipisicing velit elit id dolore elit laborum nostrud amet velit sit amet voluptate.</p>
                                </div> -->
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-md-5 col-lg-4 col-xl-4">
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
                    <form class="my-4" action="./index.html" method="POST">
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

endwhile;

get_footer();
