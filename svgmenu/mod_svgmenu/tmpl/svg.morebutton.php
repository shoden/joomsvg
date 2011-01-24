<?php header("Content-type: image/svg+xml");

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?> ';

$width  = intval( (isset($_GET['w']))?$_GET['w']:120 );
$height = intval( (isset($_GET['h']))?$_GET['h']:150 );

//$width = 120; $height = 150;

// SVG header
echo '<svg xmlns="http://www.w3.org/2000/svg" 
    xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svg="http://www.w3.org/2000/svg"
    xml:space="preserve"
    id="blue_button"
    width="100%" height="100%"
    viewBox="0 0 '.$width . ' '. $height .'">
<a xlink:href="'. $_GET['link'] .'" target="_new">
<g role="button" cursor="pointer" style="opacity: 1.0">';

// Elements definition
echo '<defs>';

// Button
$buttonFile = '../images/button_black.svg';
if( file_exists($buttonFile) )
	include($buttonFile);


// Text
echo '<g id="text">
			<text font-family="Verdana" font-size="'. $_GET["ts"].'" 
			fill="black" content-value="'. $_GET["t"].'"
         style="dominant-baseline: central; text-anchor:middle;">'
         . $_GET["t"].'</text></g>';

// Icon 
 
$iconFile = '../icons/'. $_GET["i"];
if( file_exists($iconFile) )
	include($iconFile);

// End of elements definition
echo '</defs>';

if($_GET['debug']==1)
	echo'<g id="Layer_1"><rect fill-rule="evenodd" clip-rule="evenodd" 
	     fill="#FF0000" width="100%" height="100%"/></g>';
	     
// Render elements
echo '<use id="button1" xlink:href="#button" x="'.($width-90)/2 .'" y="0"/>';
echo '<use id="icon1" xlink:href="#icon" x="'.($width-64)/2 .'" y="13"/>';
echo '<use id="txt1" xlink:href="#text" x="'.$width/2 .'" y="100" />';

// SVG end
echo '</g></a></svg>';
?>
