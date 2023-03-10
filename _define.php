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
if (!defined('DC_RC_PATH')) {
    return;
}

$this->registerModule(
    'mediaSizeClass',
    'Add CSS classes to images from your public folder',
    'Kozlika, Franck Paul and contributors',
    '1.0',
    [
        'requires'    => [['core', '2.23']],
        'permissions' => dcCore::app()->auth->makePermissions([
            dcAuth::PERMISSION_ADMIN,
        ]),
        'type'        => 'plugin',
        'settings'    => [
            'blog' => '#params.mediasizeclass',
        ],

        'details'     => 'https://github.com/franck-paul/mediaSizeClass',
        'support'     => 'https://github.com/franck-paul/mediaSizeClass',
        'repository'  => 'https://raw.githubusercontent.com/franck-paul/mediaSizeClass/master/dcstore.xml',
    ]
);
