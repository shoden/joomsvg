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
 
// get the items to display from the helper
$items = ModSvgMenuHelper::getItems($menutype);

$colors = array();
$colors[0]  = "red";
$colors[1]  = "yellow";
$colors[2]  = "green";
$colors[3]  = "blue";

function button($id, $data, $size)
{
	echo '<object id="button-'. $id .' type="image/svg+xml" data="'. 
	  $data .'" height="'. $size .'%" width="'. $size .'%">
		<param name="wmode" value="transparent">
	  </object>';
 }
 
 function space($size)
{
	echo '<object type="image/svg+xml" data="modules/mod_svgmenu/images/blank.svg"
	    height="1%" width="'. $size .'%">
		<param name="src" value="blank.svg">
		<param name="wmode" value="transparent">
	  </object>';
 }
	  

// include the template for display
require(JModuleHelper::getLayoutPath('mod_svgmenu'));
?>
