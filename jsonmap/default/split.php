<?php
/**
 * @package     Joomla.Site
 * @subpackage  Modules.jsonmap
 *
 * @copyright   Copyright (C) 2015 Christian Hent. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?> 
<div class="jsm-container">
    <div class="row-fluid">
        <div class="span3">
        <?php echo JLayoutHelper::render('joomla.jsonmap.default.list', $displayData); ?>
        </div>
        <div class="span9">
        <?php echo JLayoutHelper::render('joomla.jsonmap.maps.google', $displayData); ?>
        </div>
    </div>
</div>
