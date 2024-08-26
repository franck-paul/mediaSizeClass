<?php
/**
 * @brief mediaSizeClass, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Kozlika, Franck Paul and contributors
 *
 * @copyright Kozlika, kozlika@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
$this->registerModule(
    'mediaSizeClass',
    'Add CSS classes to images from your public folder',
    'Kozlika, Franck Paul and contributors',
    '4.1',
    [
        'requires'    => [['core', '2.28']],
        'permissions' => 'My',
        'type'        => 'plugin',
        'settings'    => [
            'blog' => '#params.mediasizeclass',
        ],

        'details'    => 'https://github.com/franck-paul/mediaSizeClass',
        'support'    => 'https://github.com/franck-paul/mediaSizeClass',
        'repository' => 'https://raw.githubusercontent.com/franck-paul/mediaSizeClass/main/dcstore.xml',
    ]
);
