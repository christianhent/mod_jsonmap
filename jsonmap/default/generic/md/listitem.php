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
$item = $displayData;
?>
<?php if (!empty($item['id']) && !empty($item['name']))  : ?>
	<div itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
		<meta itemprop="name" content="<?php echo $item['name'] ?>"/>
		<?php if (!empty($item['url']))  : ?>
		<meta itemprop="url" content="<?php echo $item['url'] ?>"/>
		<?php endif; ?>
		<?php if (!empty($item['image']))  : ?>
		<meta itemprop="image" content="<?php echo $item['image'];?>"/>
		<?php endif; ?>
		<?php if (!empty($item['summary']))  : ?>
			<meta itemprop="description" content="<?php echo $item['summary'];?>"/>
		<?php endif; ?>
	</div>
<?php endif; ?>

