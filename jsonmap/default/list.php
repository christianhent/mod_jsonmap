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
$list   = $displayData['items'];
$params = $displayData['params'];
?> 
<div itemscope itemtype="http://schema.org/ItemList">
<meta itemprop="name" content="A simple List" />
<ul class="unstyled">
<?php foreach ($list as $item) : ?>
    <?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.md.listitem', $item); ?>
    <li>
    <?php echo JLayoutHelper::render('joomla.jsonmap.default.generic.title', array('item' => $item, 'params'=> $params)); ?>
    </li>
<?php endforeach; ?>
</ul>
</div>
