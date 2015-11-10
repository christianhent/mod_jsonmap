<?php
/**
 * @package     Joomla.Site
 * @subpackage  Modules.jsonmap
 *
 * @copyright   Copyright (C) 2015 Christian Hent. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
# add CSS
$doc    = JFactory::getDocument();
$doc->addStyleSheet(JURI::root().'media/mod_jsonmap/css/style.css');
?>
<div class="jsm<?php echo $displayData['moduleclass_sfx'] ?>">
<?php echo $this->sublayout($displayData['params']->get('layout'), $displayData); ?>
</div>
