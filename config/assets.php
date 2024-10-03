<?php
declare(strict_types = 1);

use NatOkpe\Wp\Theme\Keek\Theme;

$styles = [];
$scripts = [
    'jquery' => null,
];

$styles['no-keek'] = [
    'src'   => Theme::url('style.css'),
    'deps'   => [],
    'ver'   => false,
    'media' => 'all'
];

$scripts['no-keek'] = [
    'src'    => Theme::url('script.js'),
    'deps'    => [],
    'ver'    => false,
    'footer' => true
];

return [
    'styles'  => $styles,
    'scripts' => $scripts,
];
