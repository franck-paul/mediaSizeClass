<?php
/**
 * @brief mediaSizeClass, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Franck Paul and contributors
 *
 * @copyright Franck Paul carnet.franck.paul@gmail.com
 * @copyright GPL-2.0 https://www.gnu.org/licenses/gpl-2.0.html
 */
declare(strict_types=1);

namespace Dotclear\Plugin\mediaSizeClass;

class FrontendBehaviors
{
    public static function publicHeadContent()
    {
        $settings = My::settings();
        if (!$settings->enabled) {
            return;
        }

        echo
        My::jsLoad('msc.js');
    }
}
