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

namespace Dotclear\Plugin\mediaSizeClass;

use dcCore;
use dcUtils;

dcCore::app()->addBehaviors([
    'publicHeadContent' => [__NAMESPACE__ . '\publicBehaviors', 'publicHeadContent'],
]);

class publicBehaviors
{
    public static function publicHeadContent()
    {
        if (!dcCore::app()->blog->settings->mediasizeclass->enabled) {
            return;
        }

        echo
        dcUtils::jsModuleLoad('mediasizeclass/js/msc.js');
    }
}
