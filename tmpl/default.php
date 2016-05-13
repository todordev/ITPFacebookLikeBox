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

<?php if($params->get('include_root_div', 1)) {?>
<div id="fb-root"></div>
<?php }?>

<div id="<?php echo $fbpageId; ?>">
    <?php echo $code; ?>
</div>