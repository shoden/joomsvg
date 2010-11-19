<?php header("Content-type: image/svg+xml");

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?> ';

// SVG header
echo '<svg xmlns="http://www.w3.org/2000/svg" 
    xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svg="http://www.w3.org/2000/svg"
    xml:space="preserve"
    id="blue_button"
    width="100%" height="100%"
    viewBox="-45 0 180 120">
<a xlink:href="'. $_GET['link'] .'" target="_new">
<g role="button" cursor="pointer">';

// Elements definition
echo '<defs>';

// Button
$buttonFile = '../images/button_'. $_GET["color"] .'.svg';
if( file_exists($buttonFile) )
	include($buttonFile);


// Text
echo '<g id="text">
			<text font-family="Verdana" font-size="param(fontsize)" 
			fill="black" content-value="'. $_GET["text"].'"
         style="dominant-baseline: central; text-anchor:middle;">'
         . $_GET["text"].'</text></g>';

// Icon 
 
$iconFile = '../icons/'. $_GET["icon"];
if( file_exists($iconFile) )
	include($iconFile);

// End of elements definition
echo '</defs>';

// Render elements
echo '<use id="button1" xlink:href="#button" x="0" y="0"/>';
echo '<use id="icon1" xlink:href="#icon" x="13" y="13"/>';
echo '<use id="txt1" xlink:href="#text" x="45" y="100" />';

// SVG end
echo '</g></a></svg>';
?>
