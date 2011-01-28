<?php
//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
// include the helper file
require_once(dirname(__FILE__).DS.'helper.php');
 
// get parameters from the module's configuration
$menutype = $params->get('mymenu');
$iconsize = $params->get('iconsize');
$iconwidth = $params->get('iconwidth');
$iconheight = $params->get('iconheight');
$iconmargin = $params->get('iconmargin');
$iconfontsize = $params->get('iconfontsize');
$bg = $params->get('bg');
 
// get the items to display from the helper
$items = ModSvgMenuHelper::getItems($menutype); 

// include the template for display
require(JModuleHelper::getLayoutPath('mod_svgmenu'));
?>
