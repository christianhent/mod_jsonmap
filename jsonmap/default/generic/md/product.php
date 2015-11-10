<?php
defined('_JEXEC') or die;
// Descriptive
$product = $displayData;
$prop    = $product['properties'];
?>
<?php if (!empty($prop['product'])) : ?>
<div itemscope itemtype="http://schema.org/Product">
<?php if (!empty($prop['product']['url'])) : ?>
	<meta itemprop="url" content="<?php echo $prop['product']['url'] ?>"/>
<?php elseif (!empty($product['url'])) : ?>
	<meta itemprop="url" content="<?php echo $product['url'];?>"/>
<?php endif; ?>
<?php if (!empty($prop['product']['name'])) : ?>
	<meta itemprop="name" content="<?php echo $prop['product']['name'] ?>"/>
<?php else: ?>
	<meta itemprop="name" content="<?php echo $product['name'] ?>"/>
<?php endif; ?>
<?php if (!empty($prop['product']['image'])) : ?>
	<meta itemprop="image" content="<?php echo $prop['product']['image'];?>"/>
<?php elseif (!empty($product['image'])) : ?>
	<meta itemprop="image" content="<?php echo $product['image'];?>"/>
<?php endif; ?>
<?php if (!empty($prop['product']['summary'])) : ?>
	<meta itemprop="description" content="<?php echo $prop['product']['summary'];?>"/>
<?php elseif (!empty($product['summary'])) : ?>
	<meta itemprop="description" content="<?php echo $product['summary'];?>"/>
<?php endif; ?>
<?php if (!empty($prop['product']['price'])) : ?>
	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<meta itemprop="price" content="<?php echo $prop['product']['price'] ?>"/>
	<?php if (!empty($prop['product']['url'])) : ?>
	<meta itemprop="url" content="<?php echo $prop['product']['url'] ?>"/>
	<?php elseif (!empty($product['url'])) : ?>
	<meta itemprop="url" content="<?php echo $product['url'] ?>"/>
	<?php endif; ?>
	<?php if (!empty($prop['product']['currency'])) : ?>
	<meta itemprop="priceCurrency" content="<?php echo $prop['product']['currency'] ?>"/>
	<?php endif; ?>
	</div>
<?php endif; ?>
</div>
<?php endif; ?>
