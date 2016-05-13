<?php
/**
 * @package      ITPrism Modules
 * @subpackage   ITPFacebookLikeBox
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2016 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl-3.0.en.html
 */

// no direct access
defined("_JEXEC") or die;

if ($params->get('dynamic_locale', 0)) {
    $lang   = JFactory::getLanguage();
    $locale = $lang->getTag();
    $locale = str_replace('-', '_', $locale);
} else {
    $locale = $params->get('locale', 'en_US');
}

$facebookLikeAppId = '';
if ($params->get('app_id')) {
    $facebookLikeAppId = '&appId=' . $params->get('app_id');
}

if ($params->get('load_js', 1)) {
    $js = '
    (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/'. $locale .'/sdk.js#xfbml=1&version=v2.6'.$facebookLikeAppId.'";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, \'script\', \'facebook-jssdk\'));
    ';

    $doc = JFactory::getDocument();
    $doc->addScriptDeclaration($js);
}

$code = '<div class="fb-page"
    data-href="' . $params->get('page_link') .'"
    data-width="{WIDTH}"
    data-height="' . $params->get('height') .'"
    data-show-facepile="' .  $params->get('show_facepile', 1) .'"
    data-tabs="' . $params->get('tabs', 'timeline') .'"
    data-hide-cover="' . $params->get('hide_cover', 1) .'"
    data-hide-cta="' . $params->get('hide_cta', 0) .'"
    data-small-header="' . $params->get('small_header', 0) .'"
    data-adapt-container-width="' . $params->get('adapt_container', 1) .'"
    >
        <div class="fb-xfbml-parse-ignore">
            <blockquote cite="' . $params->get('page_link') .'"><a href="'.$params->get('page_link') .'">'. $params->get('page_title') .'</a></blockquote>
        </div>
    </div>';

$fbpageId = str_replace('.', '', uniqid('fbpage_', true));
if ($params->get('responsive', 0)) {
    $code_ = trim(preg_replace('/\s\s+/', ' ', $code));
    $code_ = str_replace('{WIDTH}', '\'+containerWidth+\'', $code_);
    $js = 'jQuery(window).resize(function() {
        var containerWidth    = jQuery("#'.$fbpageId.'").width();
        jQuery("#'.$fbpageId.'").html(\''.$code_.'\');
        FB.XFBML.parse();
    });';

    $doc = JFactory::getDocument();
    $doc->addScriptDeclaration($js);
}

$code = str_replace('{WIDTH}', $params->get('width'), $code);

require JModuleHelper::getLayoutPath('mod_itpfblikebox', $params->get('layout', 'default'));