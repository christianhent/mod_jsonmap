<?php
defined('_JEXEC') or die;
// Descriptive
$place = $displayData;
$prop  = $place['properties'];
?>
<div itemscope itemtype="http://schema.org/Place">
	<meta itemprop="name" content="<?php echo $place['name'] ?>"/>
<?php if (!empty($place['url'])) : ?>
	<meta itemprop="url" content="<?php echo $place['url'] ?>"/>
<?php endif; ?>
<?php if (!empty($place['image']))  : ?>
	<meta itemprop="image" content="<?php echo $place['image'];?>"/>
<?php endif; ?>
<?php if (!empty($place['summary']) )  : ?>
	<meta itemprop="description" content="<?php echo $place['summary'];?>"/>
<?php endif; ?>
<?php if (!empty($prop['address']))  : ?>
	<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
	<?php if (!empty($prop['address']['street']))  : ?>
	<meta itemprop="streetAddress" content="<?php echo $prop['address']['street'];?>"/>
	<?php endif; ?>
	<?php if (!empty($prop['address']['postal-code']))  : ?>
	<meta itemprop="postalCode" content="<?php echo $prop['address']['postal-code'];?>"/>
	<?php endif; ?>
	<?php if (!empty($prop['address']['locality']) )  : ?>
	<meta itemprop="addressLocality" content="<?php echo $prop['address']['locality'];?>"/>
	<?php endif; ?>
	<?php if (!empty($prop['address']['country']))  : ?>
	<meta itemprop="addressCountry" content="<?php echo $prop['address']['country'];?>"/>
	<?php endif; ?>
	<?php if (!empty($prop['address']['po-box']))  : ?>
	<meta itemprop="postOfficeBoxNumber" content="<?php echo $prop['address']['po-box'];?>"/>
	<?php endif; ?>
	</div>
<?php endif; ?>
<?php if (!empty($place['geo']['latitude']) && !empty($place['geo']['longitude']))  : ?>
	<div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
	<meta itemprop="latitude" content="<?php echo $place['geo']['latitude'] ?>" />
	<meta itemprop="longitude" content="<?php echo $place['geo']['longitude'] ?>" />
	</div>
<?php endif; ?>
</div>
