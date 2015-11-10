<?php
/**
 * @package     Joomla.Site
 * @subpackage  Modules.jsonmap
 *
 * @copyright   Copyright (C) 2015 Christian Hent. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
# needed for the correct com_ajax request
$menu_id  = JFactory::getApplication()->getMenu()->getActive()->id;
?>
<script type="text/javascript">
var jsmObj = new Object();
jQuery(document).ready(function(){
    jsmObj.jqxhr = jQuery.getJSON( '/index.php?option=com_ajax&module=jsonmap&method=getParams&format=json&Itemid=<?php echo (int)$menu_id ?>', function() {})
	.done(function(data) {
		jsmObj.mod_params = data.data;
		if (jsmObj.mod_params.show_styles == 1) {
			jsmObj.styles = JSON.parse(jsmObj.mod_params.styles);
		};
		jsmObj.markers = [];
		jsmObj.icon = '';
		jsmObj.markerClusterer = null;
		jsmObj.map = new google.maps.Map(document.getElementById('jsmMap'),{});
		jsmObj.bounds = new google.maps.LatLngBounds();
		jsmObj.oms = new OverlappingMarkerSpiderfier(jsmObj.map,{markersWontMove: true,markersWontHide: true,keepSpiderfied: true,circleSpiralSwitchover: 20,legWeight: 0});
		jsmObj.iw = new google.maps.InfoWindow();
		jsmObj.jqxhr = jQuery.getJSON( '/index.php?option=com_ajax&module=jsonmap&method=getData&format=json&Itemid=<?php echo (int)$menu_id ?>', function() {})
		.done(function(data) {
			if (jsmObj.markerClusterer){
				jsmObj.markerClusterer.clearMarkers();
			}
			jQuery.each( data.data, function( key, val ) {
				var id = val.id;
				var popupHTML = (val.url) ? '<p><a target="_blank" href="' + val.url + '" title="' + val.name + '">' + val.name + '</a></p>' : '<p>' + val.name + '</p>';			
				var iconUrl = (val.icon) ? val.icon : 'http://maps.google.com/mapfiles/ms/icons/green-dot.png';
				var icon = {
					url: iconUrl,
					size: new google.maps.Size(30, 30),
					scaledSize: new google.maps.Size(30, 30),
					origin: new google.maps.Point(0,0)
				};
				var latLng = new google.maps.LatLng(val.geo['latitude'], val.geo['longitude'])
				var marker = new google.maps.Marker({position: latLng,draggable: false, icon: icon, optimized: false});
				marker.id = 'jsm-item-' + id;
				marker.desc = popupHTML;
				jsmObj.bounds.extend(marker.position);
				jsmObj.oms.addMarker(marker);
				jsmObj.markers.push(marker);
			});
			jsmObj.markerClusterer = new MarkerClusterer(jsmObj.map, jsmObj.markers, {
				maxZoom: 18,
				gridSize: 40,
				minClusterSize: 10
			});
			jsmObj.map.fitBounds(jsmObj.bounds);
			jsmObj.markerClusterer.setMap(jsmObj.map);
			if (jsmObj.mod_params.show_styles == 1) {
				jsmObj.map.setOptions({styles: jsmObj.styles});
			}
			jsmObj.oms.addListener('spiderfy', function() {
				jsmObj.iw.close();
			});
			jsmObj.oms.addListener('unspiderfy', function() {
				jsmObj.iw.close();
			});
			jsmObj.oms.addListener('click', function(marker, event) {
				jsmObj.iw.setContent(marker.desc);
				jsmObj.iw.open(jsmObj.map, marker);
			});
			jQuery( "#jsmResetBtn" ).on( "click", function() {
				jsmObj.iw.close();
				jsmObj.map.fitBounds(jsmObj.bounds);
				jsmObj.markerClusterer.setMap(jsmObj.map);
			});

			if (jsmObj.mod_params.jump){
				if (jsmObj.mod_params.layout == 'split' || jsmObj.mod_params.layout == 'events' || jsmObj.mod_params.layout == 'places' || jsmObj.mod_params.layout == 'products' ) {
					jQuery( "[id^=jsm-item-]" ).on( "click", function() {
						jQuery('html, body').animate({
							scrollTop: jQuery("#jsmMap").offset().top
						}, 1500);
						var id = jQuery(this).attr('id');
						var marker = findMarker(id);
						jsmObj.map.setCenter(marker.position);
						jsmObj.map.setZoom(18);
						jsmObj.iw.setContent(marker.desc);
						jsmObj.iw.open(jsmObj.map, marker);
						google.maps.event.trigger(marker, 'click');
						// helper
						function findMarker(id){
							for (var i = 0, len = jQuery(jsmObj.markers).length; i < len; i++) {
								if (jQuery(jsmObj.markers)[i].id === id) { 
									return jQuery(jsmObj.markers)[i];
								}
							}
							return null;
						}
					});
					jQuery( "#jsmScrollBtn" ).on( "click", function() {
						jQuery('html, body').animate({
							scrollTop: jQuery(".jsm"+jsmObj.mod_params.moduleclass_sfx).offset().top
						}, 1500);
					});
				}
			}
			
		})
		.fail(function() {})
		.always(function() {});
	})
	.fail(function() {})
	.always(function() {});
});
</script>