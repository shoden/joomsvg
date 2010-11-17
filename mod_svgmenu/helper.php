<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once JPATH_BASE.DS.'modules'.DS.'mod_mainmenu'.DS.'helper.php';

class ModSvgMenuHelper extends modMainMenuHelper 
{
	/**
	 * Retrieve menu_image value from $item->params
	 */
	public function getImage($string)
	{
		$a = explode("\n",$string);
		$b = preg_grep("/^menu_image=[a-zA-Z0-9._-]+/", $a);
		
		$img ="";
		foreach($b as $c)
			$img = preg_replace("/menu_image=([a-zA-Z0-9._-]+)/", "$1", $c);

		return $img;
	}

    /**
     * Returns a list of post items
    */
    public function getItems($menutype)
    {
        // get a reference to the database
        $db = &JFactory::getDBO();
        $query = 'SELECT id, name, link, type, parent, params FROM `#__menu` WHERE menutype="'. $menutype .'" AND published=1 ORDER BY ordering;'; 
        $db->setQuery($query);
        $items = ($items = $db->loadObjectList())?$items:array();
        
        foreach($items as $item)
			$item->img = self::getImage($item->params);
 
        return $items;
    } //end getItems
 
} //end SvgMenuHelper
?>
