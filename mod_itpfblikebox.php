<?php
/**
 * @package      ITPrism Modules
 * @subpackage   ITPFacebookLikeBox
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2014 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// no direct access
defined("_JEXEC") or die;

if ($params->get("fbDynamicLocale", 0)) {
    $lang   = JFactory::getLanguage();
    $locale = $lang->getTag();
    $locale = str_replace("-", "_", $locale);
} else {
    $locale = $params->get("fbLocale", "en_US");
}

$facebookLikeAppId = "";
if ($params->get("facebookLikeAppId")) {
    $facebookLikeAppId = "&appId=" . $params->get("facebookLikeAppId");
}

$doc = JFactory::getDocument();

// Make Facebook Like Box responsive
if ($params->get("facebookResponsive", 0)) {
    $css = '
    #fb-root {
      display: none;
    }
            
    .fb-like-box, .fb-like-box span, .fb-like-box span iframe[style]  {
      min-width: ' . $params->get("fbWidth") . 'px;
      width: 100% !important;
    }
    
';

} else {

    $css = '
    #sidebar .widget_facebook-like-box, #sidebar .fb_iframe_widget iframe {
        width: ' . $params->get("fbWidth") . 'px !important;
    }';

}

$doc->addStyleDeclaration($css);

require JModuleHelper::getLayoutPath('mod_itpfblikebox', $params->get('layout', 'default'));