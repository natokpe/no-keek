<?php
/**
 * Template Name: Dashboard
 */
 
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

if (! is_user_logged_in()) {
    wp_redirect(get_page_link(Theme::page('login')));
    exit;
}

$user = wp_get_current_user();
$tpl = null;

if (in_array('hrm', $user->roles)) {
    $tpl = 'tpl/dashboard_hrm';
}

if (in_array('accountant', $user->roles)) {
    $tpl = 'tpl/dashboard_accountant';
}

if (in_array('teacher', $user->roles)) {
    $tpl = 'tpl/dashboard_teacher';
}

if (in_array('student', $user->roles)) {
    $tpl = 'tpl/dashboard_student';
}

if (! isset($tpl)) {
    // TODO: issue error 401 - forbidden
    wp_redirect(home_url());
    exit;
}

get_template_part($tpl);
