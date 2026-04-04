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

use Dotclear\App;
use Dotclear\Helper\Html\Html;

class FrontendBehaviors
{
    public static function publicHeadContent(): string
    {
        $settings = My::settings();
        if (!$settings->enabled) {
            return '';
        }

        $list       = App::media()->getThumbSizes();
        $thumbnails = [];
        foreach ($list as $code => $info) {
            $name = isset($info[3]) && ($name = $info[3]) ? $name : '';
            if ($name !== '') {
                $thumbnails[$code] = mb_strtolower(str_replace([' ', '.', '_'], '-', $name));
            }
        }

        if ($thumbnails !== []) {
            echo
            Html::jsJson('media-size-class', [
                'types' => ['jpg', 'jpeg', 'png', 'gif', 'svg', 'wepb', 'avif'],
                'list'  => $thumbnails,
            ]) .
            My::jsLoad('msc.js');
        }

        return '';
    }
}
