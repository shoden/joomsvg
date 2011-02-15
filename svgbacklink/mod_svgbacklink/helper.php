<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once JPATH_BASE.DS.'modules'.DS.'mod_mainmenu'.DS.'helper.php';

class ModSvgBackLinkHelper 
{
  function isFrontPage(){
    $menu = & JSite::getMenu();
    if ($menu->getActive() == $menu->getDefault())
      return true;
    else
      return false;
  }

} //end SvgMenuHelper
?>
