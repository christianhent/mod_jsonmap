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
?> 
<div class="row-fluid event">
	<div class="span3">
	<?php if (!empty($event['image']))  : ?>
		<?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.image', $event['image']); ?>
	<?php endif; ?>
	</div>
	<div class="span9">
		<dl class="dl-horizontal">
		<?php if (!empty($event['properties']['event']['dtstart'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_EVENT_START_LBL");?></dt>
			<dd><?php echo JHtml::_('date', $event['properties']['event']['dtstart'], 'Y-m-d h:i A'); ?></dd>
		<?php endif; ?>
		<?php if (!empty($event['properties']['event']['dtend'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_EVENT_END_LBL");?></dt>
			<dd><?php echo JHtml::_('date', $event['properties']['event']['dtend'], 'Y-m-d h:i A'); ?></dd>
		<?php endif; ?>
		<?php if (!empty($event['properties']['event']['category'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_EVENT_TYPE_LBL");?></dt>
			<dd><?php echo $event['properties']['event']['category'];?></dd>
		<?php endif; ?>
		<?php if (!empty($event['properties']['event']['discipline'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_EVENT_DISCIPLINE_LBL");?></dt>
			<dd><?php echo $event['properties']['event']['discipline'];?></dd>
		<?php endif; ?>
		<?php if (!empty($event['properties']['location']['title'])) : ?>
			<dt><?php echo JText::_("MOD_JSONMAP_EVENT_VENUE_LBL");?></dt>
            <dd>
            <?php if (!empty($event['properties']['location']['url'])) : ?>
            	<a target="_blank" href="<?php echo $event['properties']['location']['url'];?>" title="<?php echo $event['properties']['location']['title'];?>">
            	<?php echo $event['properties']['location']['title'];?>
            	</a>
            <?php else: ?>
            	<?php echo $event['properties']['location']['title'];?>
            <?php endif; ?>
            <?php if (!empty($event['properties']['address']['locality']))  : ?>
            	<?php echo $event['properties']['address']['locality'];?>
            <?php endif; ?>
            </dd>
        <?php endif; ?>
        <?php if (!empty($event['summary'])) : ?>
        	<dt><?php echo JText::_("MOD_JSONMAP_EVENT_SUMMARY_LBL");?></dt>
        	<dd><?php echo JHtml::_('string.truncate', $event['summary'], 150)?></dd>
        <?php endif; ?>
        <?php if (!empty($event['properties']['product']['price'])) : ?>
            <dt><?php echo JText::_("MOD_JSONMAP_EVENT_PRICE_LBL");?></dt>
            <dd>
            <?php if (!empty($event['properties']['product']['url'])) : ?>
                <a target="_blank" href="<?php echo $event['properties']['product']['url'];?>" title="">
                <?php echo $event['properties']['product']['price'];?>
                <?php if (!empty($event['properties']['product']['currency'])) : ?>
                <?php echo $event['properties']['product']['currency'];?>
                <?php endif; ?>   
                </a>
            <?php else : ?>
                <?php echo $event['properties']['product']['price'];?>
                <?php if (!empty($event['properties']['product']['currency'])) : ?>
                <?php echo $event['properties']['product']['currency'];?>
                <?php endif; ?>   
            <?php endif; ?>
            </dd>
        <?php endif; ?>
        </dl>
    </div>
 </div> 
