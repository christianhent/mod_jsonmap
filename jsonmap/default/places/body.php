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
$place = $displayData;
?> 
<div class="row-fluid place">
	<div class="span3">
	<?php if (!empty($place['image'])) : ?>
		<?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.image', $place['image']); ?>
	<?php endif; ?>
	</div>
	<div class="span9">
		<dl class="dl-horizontal">
        <?php if (!empty($place['properties']['address'])) : ?>
        	<dt><?php echo JText::_("MOD_JSONMAP_LOCATION_ADDRESS_LBL");?></dt>
        	<dd>
        	<address>
        	<?php if (!empty($place['properties']['address']['street'])) : ?>
            <?php echo $place['properties']['address']['street'];?><br/>
            <?php endif; ?>
            <?php if (!empty($place['properties']['address']['postal-code']))  : ?>
            <?php echo $place['properties']['address']['postal-code'];?>
            <?php endif; ?>
            <?php if (!empty($place['properties']['address']['locality']))  : ?>
            <?php echo $place['properties']['address']['locality'];?><br/>
            <?php endif; ?>
            <?php if (!empty($place['properties']['address']['country'])) : ?>
            <?php echo $place['properties']['address']['country'];?>
            <?php endif; ?>
            </address>
            </dd>
        <?php endif; ?>
        <?php if (!empty($place['summary'])) : ?>
        	<dt><?php echo JText::_("MOD_JSONMAP_LOCATION_SUMMARY_LBL");?></dt>
        	<dd><?php echo JHtml::_('string.truncate', $place['summary'], 150)?></dd>
        <?php endif; ?>
        </dl>
    </div>
 </div> 
