<?php header("Content-type: image/svg+xml");

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?> ';

$id  = intval( (isset($_GET['id']))?$_GET['id']:0 );
$width  = intval( (isset($_GET['w']))?$_GET['w']:120 );
$height = intval( (isset($_GET['h']))?$_GET['h']:150 );
$layer = intval( (isset($_GET['l']))?$_GET['l']:4 );
$total = intval( (isset($_GET['total']))?$_GET['total']:0 );
$current = intval( (isset($_GET['current']))?$_GET['current']:1 );
$pages = $total;
$page  = $current;
$enabled = ($pages==1) ? false : true;
$action = ($enabled) ? "moreLevel($id, $layer, $pages, $page)" : "";
$opacity = ($enabled) ? 1.0 : 0.2;
$role = ($enabled) ? 'role="button" cursor="pointer"' : '';
$bg = (isset($_GET['bg'])) ? "#".$_GET['bg'] : "transparent";
$paintbg = (isset($_GET['paintbg'])) ? $bg : "transparent";

// SVG header
echo '<svg xmlns="http://www.w3.org/2000/svg" 
    xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svg="http://www.w3.org/2000/svg"
    xml:space="preserve"
    id="button-more"
    width="100%" height="100%"
    viewBox="0 0 '.$width . ' '. $height .'"
    onload="init(evt)">';
if($enabled) echo '<a onclick="'. $action .'">';
echo '<g '. $role .' style="opacity: '. $opacity .'">';

echo '<script type="application/ecmascript"> <![CDATA[';
include("ajax.js");
echo 'function changeBg(){
        document.getElementById("bg").setAttributeNS(null,"fill","'.$bg.'");
      }
      function init(evt){ showLevel('.$layer.'); parent.svgLoaded(); }';
echo ' ]]> </script>';

// Elements definition
echo '<defs>';

// Button
$buttonFile = '../images/button_black.svg';
if( file_exists($buttonFile) )
	include($buttonFile);

// Text
$pagination = ($enabled) ? " ($page,$pages)" : "";
echo '<g id="text">
			<text font-family="Verdana" font-size="'. $_GET["ts"].'" 
			fill="black" content-value="'. $_GET["t"] . $pagination.'"
         style="dominant-baseline: central; text-anchor:middle;">'
         . $_GET["t"]. $pagination.'</text></g>';

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
echo '</g>';
if($enabled) echo '</a>';
echo '</svg>';
?>
