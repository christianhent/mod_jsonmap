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
$product = $displayData;
?> 
<div class="row-fluid product">
	<div class="span3">
	<?php if (!empty($product['properties']['product']['image'])) : ?>
		<?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.image', $product['properties']['product']['image']); ?>
	<?php elseif (!empty($product['image'])) : ?>
		<?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.image', $product['image']); ?>
	<?php endif; ?>
	</div>
	<div class="span9">
		<dl class="dl-horizontal">
		<?php if (!empty($product['properties']['product'])) : ?>
			<?php if (!empty($product['properties']['product']['name'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_PRODUCT_NAME_LBL");?></dt>
			<dd><?php echo $product['properties']['product']['name'];?></dd>
			<?php endif; ?>
			<?php if (!empty($product['properties']['product']['summary'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_PRODUCT_SUMMARY_LBL");?></dt>
			<dd><?php echo $product['properties']['product']['summary'];?></dd>
			<?php elseif (!empty($product['summary'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_PRODUCT_SUMMARY_LBL");?></dt>
			<dd><?php echo $product['summary'];?></dd>
			<?php endif; ?>
			<?php if (!empty($product['properties']['product']['price'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_PRODUCT_PRICE_LBL");?></dt>
			<dd>
				<?php if (!empty($product['properties']['product']['url'])) : ?>
        		<a target="_blank" href="<?php echo $product['properties']['product']['url'];?>" title=""><?php echo $product['properties']['product']['price'];?></a>
        		<?php elseif (!empty($product['url'])) : ?>
        		<a target="_blank" href="<?php echo $product['url'];?>" title=""><?php echo $product['properties']['product']['price'];?></a>
        		<?php else: ?>
        		<?php echo $product['properties']['product']['price'];?>
				<?php endif; ?>
			</dd>
			<?php endif; ?>
			<?php if (!empty($product['properties']['product']['currency'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_PRODUCT_CURRENCY_LBL");?></dt>
			<dd><?php echo $product['properties']['product']['currency'];?></dd>
			<?php endif; ?>
		<?php endif; ?>
        </dl>
    </div>
 </div> 
