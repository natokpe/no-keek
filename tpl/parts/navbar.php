<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;


$menu = wp_nav_menu([
    'theme_location'       => 'navbar_menu',
    'menu_class'           => 'navbar-nav-menu',
    'menu_id'              => false,
    'container'            => 'nav',
    'container_class'      => 'navbar-nav',
    'container_id'         => false,
    'container_aria_label' => '',
    'fallback_cb'          => false,
    'before'               => '',
    'after'                => '',
    'link_before'          => '',
    'link_after'           => '',
    'echo'                 => false,
    'depth'                => 1,
    // 'items_wrap'           => '',
    'item_spacing'         => 'preserve',
]);

?>

<div class="navbar">

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="d-flex align-items-center justify-content-between w-100">

                    <a class="navbar-brand" href="<?php echo home_url(); ?>">
                        <img src="<?= Theme::url('assets/img/brand.svg') ?>" alt="Keek Computers" />
                    </a>

                    <div class="m-0 p-0 d-inline-block">
                        <div class="navbar-action">

                            <div class="container g-lg-0">
                                <div class="row g-lg-0">
                                    <div class="col-12">

                                        <div class="navbar-action-content">
                                            <nav class="navbar-nav">
                                                <ul class="navbar-nav-menu">
                                                    <li class="menu-item current-menu-item"><a href="#">Home</a></li>
                                                    <li class="menu-item"><a href="#">Explore Courses</a></li>
                                                    <li class="menu-item"><a href="#">About Us</a></li>
                                                    <li class="menu-item"><a href="#">Contact Us</a></li>
                                                </ul>
                                            </nav>

                                            <?php // echo $menu; ?>

                                            <div class="navbar-action-main">
                                                <a class="btn btn-black btn-outline btn-medium" href="<?= get_page_link(Theme::page('login')) ?>">Login</a>
                                                <a class="btn btn-primary btn-medium" href="<?= get_page_link(Theme::page('register')) ?>">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="navbar-nav-toggle d-inline-block d-lg-none">
                            <div class="hamburger">
                                <div class="hamburger-inner"></div>
                            </div>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
