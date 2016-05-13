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

if ($params->get("dynamic_locale", 0)) {
    $lang   = JFactory::getLanguage();
    $locale = $lang->getTag();
    $locale = str_replace("-", "_", $locale);
} else {
    $locale = $params->get("locale", "en_US");
}

$facebookLikeAppId = "";
if ($params->get("app_id")) {
    $facebookLikeAppId = "&appId=" . $params->get("app_id");
}

require JModuleHelper::getLayoutPath('mod_itpfblikebox', $params->get('layout', 'default'));