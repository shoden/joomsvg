<?php
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once JPATH_BASE.DS.'modules'.DS.'mod_mainmenu'.DS.'helper.php';

class ModSvgBackLinkHelper 
{
  function isFrontPage(){
    /* Joomla way
    $menu = & JSite::getMenu();
    if ($menu->getActive() == $menu->getDefault())
      return true;
    else
      return false;
    */
    /* Bad way */
    $pos = strpos( $_SERVER['REQUEST_URI'], 'option' );
    if($pos == false)
      return true;
    else
      return false;
  }

} //end SvgMenuHelper
?>
