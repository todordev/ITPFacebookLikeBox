<?php
/**
 * @package      ITPrism Modules
 * @subpackage   ITPFacebookLikeBox
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2014 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// no direct access
defined( "_JEXEC" ) or die;?>

<?php if($params->get("include_root_div", 1)) {?>
<div id="fb-root"></div>
<?php }?>

<?php if($params->get("load_js", 1)) {?>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/<?php echo $locale;?>/sdk.js#xfbml=1&version=v2.3<?php echo $facebookLikeAppId;?>";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php }?>


<div class="fb-page"
data-href="<?php echo $params->get("page_link");?>"
data-width="<?php echo $params->get("width");?>"
data-height="<?php echo $params->get("height");?>"
data-show-facepile="<?php echo $params->get("show_facepile", 1); ?>"
data-show-posts="<?php echo $params->get("show_posts", 1); ?>"
data-hide-cover="<?php echo $params->get("hide_cover", 1); ?>">

    <div class="fb-xfbml-parse-ignore">
        <blockquote cite="<?php echo $params->get("page_link");?>"><a href="<?php echo $params->get("page_link");?>"><?php echo $params->get("page_title");?></a></blockquote>
    </div>
</div>