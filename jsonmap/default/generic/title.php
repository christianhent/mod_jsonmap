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
$item   = $displayData['item'];
$params = $displayData['params'];
?> 
<?php if (!empty($item['id']) && !empty($item['name'])): ?>
	<?php if (!empty($item['icon']))  : ?>
		<img src="<?php echo $item['icon'];?>" class="jsm-icon"/>
	<?php endif; ?>
	<?php if ($params['jump'] == 1)  : ?>
		<a href="#" id="jsm-item-<?php echo $item['id']; ?>" title="<?php echo $item['name'];?>">
		<?php echo $item['name'];?>
		</a>
	<?php elseif (!empty($item['url'])): ?>
		<a target="_blank" href="<?php echo $item['url'] ?>" title="<?php echo $item['name'];?>">
		<?php echo $item['name'];?>
		</a>
	<?php else: ?>
	<?php echo $item['name'];?>
	<?php endif; ?>
<?php endif; ?>
