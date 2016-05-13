<?php
/**
 * @package      ITPrism Modules
 * @subpackage   ITPFacebookLikeBox
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2016 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl-3.0.en.html
 */

// no direct access
defined( "_JEXEC" ) or die;?>

<?php if($params->get('include_root_div', 1)) {?>
<div id="fb-root"></div>
<?php }?>

<div id="<?php echo $fbpageId; ?>">
    <?php echo $code; ?>
</div>