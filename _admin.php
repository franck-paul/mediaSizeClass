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
use form;

if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

// dead but useful code, in order to have translations
__('mediaSizeClass') . __('Add CSS classes to images from your public folder');

if (version_compare(DC_VERSION, '2.24', '<')) {
    dcCore::app()->addBehavior('adminBlogPreferencesFormV1', [adminBehaviors::class, 'adminBlogPreferencesFormV1']);
    dcCore::app()->addBehavior('adminBeforeBlogSettingsUpdate', [adminBehaviors::class, 'adminBeforeBlogSettingsUpdate']);
} else {
    dcCore::app()->addBehaviors([
        'adminBlogPreferencesFormV2'    => [adminBehaviors::class, 'adminBlogPreferencesForm'],
        'adminBeforeBlogSettingsUpdate' => [adminBehaviors::class, 'adminBeforeBlogSettingsUpdate'],
    ]);
}

class adminBehaviors
{
    public static function adminBlogPreferencesFormV1($core, $settings)
    {
        return self::adminBlogPreferencesForm($settings);
    }

    public static function adminBlogPreferencesForm($settings)
    {
        echo
        '<div class="fieldset"><h4 id="mediasizeclass">' . __('Add CSS classes to your medias') . '</h4>' .

        '<p><label class="classic">' .
        form::checkbox('mediasizeclass_enabled', '1', $settings->mediasizeclass->enabled) .
        __('Add a CSS class in &lt;img /&gt; tag depending on media size inserted: "thumbnail-img" to thumbnail-size medias; "square-img" to square-size medias; "small-img" to small-size medias; "medium-img" to medium-size medias.') . '</label></p>' .

        '</div>';
    }

    public static function adminBeforeBlogSettingsUpdate($settings)
    {
        if (version_compare(DC_VERSION, '2.24', '<')) {
            $settings->addNamespace('mediasizeclass');
        }
        $settings->mediasizeclass->put('enabled', !empty($_POST['mediasizeclass_enabled']), 'boolean');
    }
}
