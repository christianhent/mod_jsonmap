<?php
/**
 * @package     Joomla.Site
 * @subpackage  Modules.jsonmap
 *
 * @copyright   Copyright (C) 2015 Christian Hent. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once __DIR__ . '/helper.php';

$result = ModJsonmapHelper::_getData($params->get('datasource'));

if (!empty($result))
{
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

	$data = array('items' => $result, 'params' => $params, 'moduleclass_sfx' => $moduleclass_sfx);

	$layout = new JLayoutFile('joomla.jsonmap.default', $basePath = null, array('suffixes' => array('bs2', 'bs3'), 'debug' => false));

	echo $layout->render($data);
}
