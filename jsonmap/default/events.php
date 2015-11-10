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
$events  = $displayData['items'];
$params  = $displayData['params'];
?> 
<div class="jsm-container">
<?php echo JLayoutHelper::render('joomla.jsonmap.maps.google', $displayData); ?>
<?php foreach ($events as $event) : ?>
	<?php if (!empty($event['id']) && !empty($event['name'])) : ?>
		<?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.md.event', $event); ?>
		<h4><?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.title', array('item' => $event, 'params'=> $params)); ?></h4>
		<?php echo $this->sublayout('body', $event); ?>
	<?php endif; ?>
<?php endforeach; ?>
</div>
