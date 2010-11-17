<?php
//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
// include the helper file
require_once(dirname(__FILE__).DS.'helper.php');
 
// get parameters from the module's configuration
$menutype = $params->get('mymenu');
$iconsize = $params->get('iconsize');
 
// get the items to display from the helper
$items = ModSvgMenuHelper::getItems($menutype);

$colors = array();
$colors[0]  = "rojo";
$colors[1]  = "amarillo";
$colors[2]  = "verde";
$colors[3]  = "azul";

// include the template for display
require(JModuleHelper::getLayoutPath('mod_svgmenu'));
?>
