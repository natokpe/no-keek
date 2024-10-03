<?php

declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;
use NatOkpe\Wp\Theme\Keek\Utils\Clock;

$user_logged = is_user_logged_in();

$menu_data = [
    'menu_1_name' => wp_get_nav_menu_name('footer_menu_1'),
    'menu_2_name' => wp_get_nav_menu_name('footer_menu_2'),

    'menu_1'      => wp_nav_menu([
        'theme_location'       => 'footer_menu_1',
        'menu_class'           => 'page-footer-menu',
        'menu_id'              => false,
        'container'            => 'nav',
        'container_class'      => 'page-footer-nav',
        'container_id'         => false,
        'container_aria_label' => '',
        'fallback_cb'          => false,
        'before'               => '',
        'after'                => '',
        'link_before'          => '',
        'link_after'           => '',
        'echo'                 => false,
        'depth'                => 1,
        // 'items_wrap'        => '',
        'item_spacing'         => 'preserve',
    ]),

    'menu_2'      => wp_nav_menu([
        'theme_location'       => 'footer_menu_2',
        'menu_class'           => 'page-footer-menu',
        'menu_id'              => false,
        'container'            => 'nav',
        'container_class'      => 'page-footer-nav',
        'container_id'         => false,
        'container_aria_label' => '',
        'fallback_cb'          => false,
        'before'               => '',
        'after'                => '',
        'link_before'          => '',
        'link_after'           => '',
        'echo'                 => false,
        'depth'                => 1,
        // 'items_wrap'        => '',
        'item_spacing'         => 'preserve',
    ]),
];

?>
<div class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 col-xl-5">
                <p class="page-footer-desc">Deserunt culpa aute excepteur nostrud commodo eiusmod laborum eu. Lorem ipsum in sed laboris voluptate culpa ullamco in aute velit dolore ad excepteur amet.</p><!-- Inter Regular 14px -->
            </div>
            <div class="col-md-6 col-lg-2 col-xl-2">
                <h3 class="page-footer-heading">Company</h3><!-- Inter Semi Bold 18px -->
                <nav class="page-footer-nav">
                    <ul class="page-footer-menu">
                        <li class="menu-item"><a href="#">Explore Courses</a></li><!-- Inter Medium 14px -->
                        <li class="menu-item"><a href="#">Features</a></li>
                        <li class="menu-item"><a href="#">Blog</a></li>
                        <li class="menu-item"><a href="#">Events</a></li>
                        <li class="menu-item"><a href="#">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6 col-lg-2 col-xl-2">
                <h3 class="page-footer-heading">Resourses</h3><!-- Inter Semi Bold 18px -->
                <nav class="page-footer-nav">
                    <ul class="page-footer-menu">
                        <li class="menu-item"><a href="#">Help</a></li><!-- Inter Medium 14px -->
                        <li class="menu-item"><a href="#">FAQ</a></li>
                        <li class="menu-item"><a href="#">About Us</a></li>
                        <li class="menu-item"><a href="#">Privacy Policy</a></li>
                        <li class="menu-item"><a href="#">Terms and Conditions</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <h3 class="page-footer-heading">Get In Touch</h3>

                <div itemscope itemtype="https://schema.org/Organization">
                    <span itemprop="name">Keek Computers</span>

                    <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
                        <span itemprop="streetAddress">38 ABC Avenue</span>
                        <span itemprop="postalCode">110292</span>
                        <span itemprop="addressLocality">FCT, Nigeria</span>
                    </div>

                    <i class="fi fi-brands-twitter-alt"></i>Tel:<span itemprop="telephone">+234 (012) 345-6789</span>
                    E-mail: <span itemprop="email">info(at)keekcomputers.com.ng</span>
                </div>

                <nav class="page-footer-social m-0 p-0 w-100">
                    <ul class="m-0 p-0 w-100">
                        <li><a href="#" target="_blank" rel="noreferrer noopener"><i class="fi fi-brands-facebook"></i></a></li>
                        <li><a href="#" target="_blank" rel="noreferrer noopener"><i class="fi fi-brands-twitter-alt"></i></a></li>
                        <li><a href="#" target="_blank" rel="noreferrer noopener"><i class="fi fi-brands-instagram"></i></a></li>
                        <li><a href="#" target="_blank" rel="noreferrer noopener"><i class="fi fi-brands-linkedin"></i></a></li>
                        <li><a href="#" target="_blank" rel="noreferrer noopener"><i class="fi fi-brands-github"></i></a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
</div>