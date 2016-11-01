 <?php
 /**
  * @package     Joomla.Site
  * @subpackage  Modules.jsonmap
  *
  * @copyright   Copyright (C) 2015 Christian Hent. All rights reserved.
  * @license     GNU General Public License version 2 or later; see LICENSE.txt
  */

defined('_JEXEC') or die('Restricted access');
 
class mod_jsonmapInstallerScript
{
	public function preflight($type)
    {
        if ($type != "discover_install" && $type != "install")
        {
            return true;
        }

        $version = new JVersion;

        if (version_compare($version->getShortVersion(), "3", 'lt'))
        {
            Jerror::raiseWarning(null, JText::_('MOD_JSONMAP_INSTALL_NOJ2_ERROR'));

            return false;
        }

        return true;
    }

    public function install($parent)
    {
        jimport('joomla.filesystem.folder');
        jimport('joomla.filesystem.file');

        $path = $parent->getParent()->getPath('source');
        $src  = $path.'/jsonmap';
        $dest = JPATH_SITE . '/layouts/joomla/jsonmap';

        $retVal = JFolder::move($src, $dest, '');
        
        if( $retVal !== true )
        {
        	JError::raiseWarning(100, $retVal);
        }

        JFactory::getApplication()->enqueueMessage(JText::_('MOD_JSONMAP_INSTALL_NOTICE'), 'notice');
    }

    public function update($parent)
    {
        jimport('joomla.filesystem.folder');
        jimport('joomla.filesystem.file');

        $release = $parent->get( "manifest" )->version;

        $path  = $parent->getParent()->getPath('source');
        $src   = $path.'/jsonmap';
        $dest  = JPATH_SITE . '/layouts/joomla/jsonmap';

        if(JFolder::exists($dest))
        {
        	JFolder::delete($dest);
        }

        $retVal = JFolder::move($src, $dest, '');
        
        if( $retVal !== true )
        {
        	JError::raiseWarning(100, $retVal);
        }

        JFactory::getApplication()->enqueueMessage(JText::_('MOD_JSONMAP_UPDATE_NOTICE') . $release , 'notice');        
    }

    public function uninstall($parent)
    {
        jimport('joomla.filesystem.folder');
        jimport('joomla.filesystem.file');

        $folder  = JPATH_SITE . '/layouts/joomla/jsonmap';

        if( JFolder::delete($folder) )
        {
        	JFactory::getApplication()->enqueueMessage(JText::_('MOD_JSONMAP_LAYOUTS_DELETED'), 'notice');
        }   
    }

    public function postflight($type, $parent) 
	{
		jimport('joomla.filesystem.folder');
        jimport('joomla.filesystem.file');

        $path  = JPATH_SITE . '/modules/mod_jsonmap/jsonmap';

		if(JFolder::exists($path))
        {
        	JFolder::delete($path);
        }
	}
}