<?php
//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');
 
// include the helper file
require_once(dirname(__FILE__).DS.'helper.php');
 
// get parameters from the module's configuration
$svgdiv = $params->get('svgdiv');
$svgimg = $params->get('svgimg');
$svgsize = $params->get('svgsize');
$svgwidth = $params->get('svgwidth');
$svgheight = $params->get('svgheight');

$showlink = !(ModSvgBackLinkHelper::isFrontPage());

// include the template for display
require(JModuleHelper::getLayoutPath('mod_svgbacklink'));
?>
