<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
class ModSvgMenuHelper
{
    /**
     * Returns a list of post items
    */
    public function getItems($menutype)
    {
        // get a reference to the database
        $db = &JFactory::getDBO();
        $query = 'SELECT name FROM `#__menu` WHERE parent=0 AND menutype="'. $menutype .'" ORDER BY ordering;'; 
        $db->setQuery($query);
        $items = ($items = $db->loadObjectList())?$items:array();
 
        return $items;
    } //end getItems
 
} //end SvgMenuHelper
?>
