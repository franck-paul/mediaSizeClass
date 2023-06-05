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

use dcCore;
use dcNamespace;
use Dotclear\Helper\Html\Form\Checkbox;
use Dotclear\Helper\Html\Form\Fieldset;
use Dotclear\Helper\Html\Form\Label;
use Dotclear\Helper\Html\Form\Legend;
use Dotclear\Helper\Html\Form\Para;

class BackendBehaviors
{
    public static function adminBlogPreferencesForm()
    {
        $settings = dcCore::app()->blog->settings->get(My::id());

        // Add fieldset for plugin options
        echo
        (new Fieldset('mediasizeclass'))
        ->legend((new Legend(__('Add CSS classes to your medias'))))
        ->fields([
            (new Para())->items([
                (new Checkbox('mediasizeclass_enabled', $settings->enabled))
                    ->value(1)
                    ->label((new Label(__('Add a CSS class in &lt;img /&gt; tag depending on media size inserted: "thumbnail-img" to thumbnail-size medias; "square-img" to square-size medias; "small-img" to small-size medias; "medium-img" to medium-size medias.'), Label::INSIDE_TEXT_AFTER))),
            ]),
        ])
        ->render();
    }

    public static function adminBeforeBlogSettingsUpdate()
    {
        $settings = dcCore::app()->blog->settings->get(My::id());
        $settings->put('enabled', !empty($_POST['mediasizeclass_enabled']), dcNamespace::NS_BOOL);
    }
}