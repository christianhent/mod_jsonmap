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
$products = $displayData['items'];
$params   = $displayData['params'];
?> 
<div class="jsm-container">
<?php echo JLayoutHelper::render('joomla.jsonmap.maps.google', $displayData); ?>
<?php foreach ($products as $product) : ?>
	<?php if (!empty($product['id']) && !empty($product['name'])) : ?>
		<?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.md.product', $product); ?>
		<h4><?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.title', array('item' => $product, 'params'=> $params)); ?></h4>
		<?php echo $this->sublayout('body', $product); ?>
	<?php endif; ?>
<?php endforeach; ?>
</div>
