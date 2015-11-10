<?php
/**
 * @package     Joomla.Site
 * @subpackage  Modules.jsonmap
 *
 * @copyright   Copyright (C) 2015 Christian Hent. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

abstract class ModJsonmapHelper
{
	public static function _getData($filename)
	{
		jimport('joomla.filesystem.file');
		jimport('joomla.filesystem.folder');
		jimport('joomla.application.component.helper');

		$app            = JFactory::getApplication();
		$dataSource     = JFile::makeSafe($filename);
		$dataSourcePath = JPath::clean(JPATH_ROOT . '/modules/mod_jsonmap/data/' . $dataSource);


		# file exists check
		if(!JFile::exists($dataSourcePath))
		{
			$app->enqueueMessage(JText::_('MOD_JSONMAP_DATASOURCE_NOT_FOUND'), 'error');

			return false;
		}

		# max filesize check (hardcoded, 2 MB)
		$maxSize = 2;

		if (filesize($dataSourcePath) > $maxSize * 1024 * 1024 )
		{
			$app->enqueueMessage(JText::_('MOD_JSONMAP_DATASOURCE_SIZE'), 'error');

			return false;
		}

		# file extension check
		$ext = JFile::getExt($dataSourcePath);
			
		if (!($ext === 'json'))
		{
			$app->enqueueMessage(JText::_('MOD_JSONMAP_INAPPROPRIATE_DATASOURCE_TYPE'), 'error');

			return false;
		}

		# empty file check
		if(filesize($dataSourcePath) == 0)
		{
			$app->enqueueMessage(JText::_('MOD_JSONMAP_EMPTY_DATASOURCE'), 'error');

			return false;
		}

		# *read* file check
		if(!@file_get_contents($dataSourcePath))
		{
			$app->enqueueMessage(JText::_('MOD_JSONMAP_CANNOT_ACCESS_DATASOURCE'), 'error');
				
			return false;
		}

		# decode JSON and simply check data validity
		$result = json_decode(file_get_contents($dataSourcePath), true);

		if (json_last_error() !== JSON_ERROR_NONE)
		{
    		$app->enqueueMessage(JText::_('MOD_JSONMAP_INVALID_DATA'), 'error');

			return false;
		}

		# it should be array, but hey
		if(!is_array($result))
		{
			$app->enqueueMessage(JText::_('MOD_JSONMAP_SOMETHING_GOT_WRONG'), 'error');

			return false;	
		}
			
		return $result;				
	} 

	public static function getParamsAjax()
	{
		$module = JModuleHelper::getModule('jsonmap');

		return json_decode($module->params);
	}

	public static function getDataAjax()
	{
		$params = ModJsonmapHelper::getParamsAjax();
		$data   = ModJsonmapHelper::_getData($params->datasource);

		return $data;
	}
}