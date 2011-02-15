<?php header("Content-type: image/svg+xml");

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?> ';

$width  = intval( (isset($_GET['w']))?$_GET['w']:120 );
$height = intval( (isset($_GET['h']))?$_GET['h']:150 );
$action = "upLevel(" . intval( (isset($_GET['l']))?$_GET['l']:1 ) . ")";
$bg = (isset($_GET['bg'])) ? "#".$_GET['bg'] : "transparent";
$paintbg = (isset($_GET['paintbg'])) ? $bg : "transparent";
//$action = "upLevel(1)";

//$width = 120; $height = 150;

// SVG header
echo '<svg xmlns="http://www.w3.org/2000/svg" 
    xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svg="http://www.w3.org/2000/svg"
    xml:space="preserve"
    id="button-up"
    width="100%" height="100%"
    viewBox="0 0 '.$width . ' '. $height .'"
    onload=\'parent.svgLoaded()\'>
<a onclick="'. $action . '">
<g role="button" cursor="pointer" style="opacity: 1.0">';

echo '<script type="application/ecmascript"> <![CDATA[';
include("ajax.js");
echo'function changeBg(){
    document.getElementById("bg").setAttributeNS(null,"fill","'.$bg.'");
  }';
echo' ]]> </script>';

// Elements definition
echo '<defs>';

// Button
$buttonFile = '../images/button_white1.svg';
if( file_exists($buttonFile) )
	include($buttonFile);


// Text
echo '<g id="text">
			<text font-family="Verdana" font-size="'. $_GET["ts"].'" 
			fill="black" content-value="'. $_GET["t"].'"
         style="dominant-baseline: central; text-anchor:middle;">'
         . $_GET["t"].'</text></g>';

// Icon
$iconFile = '../../../images/stories/'. $_GET["i"];
if( file_exists($iconFile) )
	include($iconFile);

// End of elements definition
echo '</defs>';

// Optional background color
echo'<g id="Layer_1"><rect id="bg" name="bg" fill-rule="evenodd" clip-rule="evenodd" 
	     fill="'.$paintbg.'" width="100%" height="100%"/></g>';
	     
// Render elements
echo '<use id="button1" xlink:href="#button" x="'.($width-90)/2 .'" y="0"/>';
echo '<use id="icon1" xlink:href="#icon" x="'.($width-64)/2 .'" y="13"/>';
echo '<use id="txt1" xlink:href="#text" x="'.$width/2 .'" y="100" />';

// SVG end
echo '</g></a></svg>';
?>
