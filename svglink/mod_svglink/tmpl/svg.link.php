<?php header("Content-type: image/svg+xml");

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?> ';

$width  = intval( (isset($_GET['w']))?$_GET['w']:120 );
$height = intval( (isset($_GET['h']))?$_GET['h']:150 );
$img = (isset($_GET['i']))?$_GET['i']:"world.svg";
$size = intval( (isset($_GET['is']))?$_GET['s']:13 );
$link =  (isset($_GET['l']))?$_GET['l']:"";
//$action = "go(\"". str_replace("%3F","?", rawurlencode($link)) ."\")";
$action = "go(\"". $link ."\")";

// SVG header
echo '<svg xmlns="http://www.w3.org/2000/svg" 
    xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svg="http://www.w3.org/2000/svg"
    xml:space="preserve"
    id="blue_button"
    width="100%" height="100%"
    viewBox="0 0 '.$width . ' '. $height .'">
<a onclick=\''. $action .'\'>
<g role="button" cursor="pointer">';

// Link script
echo '<script type="application/ecmascript"> <![CDATA[';
echo 'function go(url) { parent.location.href = url; } ]]> </script>';

// Elements definition
echo '<defs>';

// Image
$f = '../../../images/stories/'. $img;
if( file_exists($f) )
	include($f);

// End of elements definition
echo '</defs>';

// Debug background
if($_GET['debug']==1)
	echo'<g id="Layer_1"><rect fill-rule="evenodd" clip-rule="evenodd" 
	     fill="#FF0000" width="100%" height="100%"/></g>';

// Render elements
echo '<use id="icon1" xlink:href="#icon" x="0" y="0"/>';

// SVG end
echo '</g></a></svg>';
?>
