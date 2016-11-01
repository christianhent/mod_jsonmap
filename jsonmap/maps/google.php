<?php
/**
 * @package     Joomla.Site
 * @subpackage  Modules.jsonmap
 *
 * @copyright   Copyright (C) 2015 Christian Hent. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
# jQuery
JHtml::_('jquery.framework');
#GMaps
$api_key = $displayData['params']->get('gapi_key');
# JS
$doc = JFactory::getDocument();
$doc->addScript('https://maps.googleapis.com/maps/api/js?v=3&key=' . $api_key);
$doc->addScript('http://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclustererplus/src/markerclusterer_packed.js');
$doc->addScript('media/mod_jsonmap/js/markerclusterer.js');
$doc->addScript('media/mod_jsonmap/js/oms.min.js');
// Descriptive
$items  = $displayData['items'];
$params = $displayData['params'];
?>

<?php echo $this->sublayout('js', $displayData); ?>

<div class="jsm-map-container">
	<div id="jsmMap" style="height:<?php echo $displayData['params']->get('map_height'); ?>px;"></div>
	<?php if ($params->get('show_mapnavbar', 1)) : ?>
		<?php echo $this->sublayout('navbar', $params);?>
	<?php endif; ?>
</div>

<?php if ($params->get('layout') == 'map')  : ?>
	<?php foreach ($items as $item) : ?>
		<?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.md.place', $item); ?>
	<?php endforeach; ?>
<?php endif; ?>
