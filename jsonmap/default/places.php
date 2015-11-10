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
$places = $displayData['items'];
$params = $displayData['params'];
?> 
<div class="jsm-container">
<?php echo JLayoutHelper::render('joomla.jsonmap.maps.google', $displayData); ?>
<?php foreach ($places as $place) : ?>
	<?php if (!empty($place['id']) && !empty($place['name'])) : ?>
	<?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.md.place', $place); ?>
	<h4><?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.title', array('item' => $place, 'params'=> $params)); ?></h4>
	<?php echo $this->sublayout('body', $place); ?>
	<?php endif; ?>
<?php endforeach; ?>
</div>
