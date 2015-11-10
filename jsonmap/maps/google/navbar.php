<?php
/**
 * @package     Joomla.Site
 * @subpackage  Modules.jsonmap
 *
 * @copyright   Copyright (C) 2015 Christian Hent. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
// Descriptive
$params = $displayData;
?>
<ul class="breadcrumb navbar">
	<li class="activ"><?php echo JText::_("MOD_JSONMAP_BUTTON_BAR_LBL");?></li>
	<li><span class="btn btn-small" id="jsmResetBtn"><?php echo JText::_("MOD_JSONMAP_MAPRESET_BTN");?></span></li>
	<?php if ($params->get('jump') == 1 && $params->get('layout') == 'split' ): ?>
	<li><span class="btn btn-small" id="jsmScrollBtn"><?php echo JText::_("MOD_JSONMAP_TOPNAV_BTN");?></span></li>
	<?php endif; ?>
</ul>