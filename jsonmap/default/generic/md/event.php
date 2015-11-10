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
$event = $displayData;
$prop  = $event['properties'];
?> 
<div itemscope itemtype="http://schema.org/Event">
	<meta itemprop="name" content="<?php echo $event['name'] ?>"/>
<?php if (!empty($event['url'])) : ?>
	<meta itemprop="url" content="<?php echo $event['url'] ?>"/>
<?php endif; ?>
<?php if (!empty($event['image'])) : ?>
	<meta itemprop="image" content="<?php echo $event['image'];?>"/>
<?php endif; ?>
<?php if (!empty($event['summary']))  : ?>
	<meta itemprop="description" content="<?php echo $event['summary'];?>"/>
<?php endif; ?>
<?php if (!empty($prop['event']['dtstart']) )  : ?>
	<meta itemprop="startDate" content="<?php echo JHtml::_('date', $prop['event']['dtstart'], ' Y-m-d\TH:i:sO'); ?>">
<?php endif; ?>
<?php if (!empty($prop['event']['dtend']))  : ?>
	<meta itemprop="enddate" content="<?php echo JHtml::_('date', $prop['event']['dtend'], ' Y-m-d\TH:i:sO'); ?>">
<?php endif; ?>   
<?php if (!empty($prop['location'])) : ?>
	<div itemprop="location" itemscope itemtype="http://schema.org/Place">
	<?php if (!empty($prop['location']['url'])) : ?>
		<meta itemprop="url" content="<?php echo $prop['location']['url'] ?>"/>
	<?php endif; ?>
	<?php if (!empty($prop['address']['locality'])) : ?>
		<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
		<meta itemprop="addressLocality" content="<?php echo $prop['address']['locality'];?>"/>
		</div>
	<?php endif; ?>
	</div>
<?php endif; ?> 
<?php if (!empty($event['properties']['product'])) : ?>
	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<?php if (!empty($prop['product']['url']))  : ?>
		<meta itemprop="url" content="<?php echo $prop['product']['url'] ?>"/>
	<?php endif; ?>
	<?php if (!empty($prop['product']['price']))  : ?>
		<meta itemprop="price" content="<?php echo $prop['product']['price'] ?>"/>
	<?php endif; ?>
	<?php if (!empty($prop['product']['currency']))  : ?>
		<meta itemprop="priceCurrency" content="<?php echo $prop['product']['currency'] ?>"/>
	<?php endif; ?>
	</div>
<?php endif; ?>
</div>
