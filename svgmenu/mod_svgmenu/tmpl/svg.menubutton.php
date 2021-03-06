<?php header("Content-type: image/svg+xml");

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?> ';

$width  = intval( (isset($_GET['w']))?$_GET['w']:120 );
$height = intval( (isset($_GET['h']))?$_GET['h']:150 );
$iconsize = intval( (isset($_GET['is']))?$_GET['is']:13 );
$layer = intval( (isset($_GET['l']))?$_GET['l']:1 );
$pages = intval( (isset($_GET['pages']))?$_GET['pages']:1 );

//$goto = $_GET['blink'] . rawurlencode(str_replace("%3F","?",$_GET['link']));
$goto = $_GET['blink'] . "/" . rawurlencode($_GET['link']);
$goto = str_replace( "%3F", "?", $goto);
$goto = str_replace( "%3D", "=", $goto);
$goto = str_replace( "%26", "&", $goto);
//$action = ($_GET["y"]==0) ? "openSubmenu(". $_GET['id'] .")" : "go(\"". $goto ."\")";
$action = ($_GET["y"]==0) ? "ajax(". $_GET['id'] .", ".  $layer . " ,". $pages . ", 1)" : "go(\"". $goto ."\")";

$bg = (isset($_GET['bg'])) ? "#".$_GET['bg'] : "transparent";
$paintbg = (isset($_GET['paintbg'])) ? $bg : "transparent";

// SVG header
echo '<svg xmlns="http://www.w3.org/2000/svg" 
    xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svg="http://www.w3.org/2000/svg"
    xml:space="preserve"
    id="blue_button"
    externalResourcesRequired="true"
    width="100%" height="100%"
    viewBox="0 0 '.$width . ' '. $height .'"
    onload=\'parent.svgLoaded()\'
    >
<a onclick=\'init(evt)\'>
<g role="button" cursor="pointer">';

// Link script
echo '<script type="application/ecmascript"> <![CDATA[';
include("ajax.js");
echo'
  function go(url) { 
		parent.location.href = url;
	}
  function changeBg(){
    document.getElementById("bg").setAttributeNS(null,"fill","'.$bg.'");
  }
  function init(evt){
    '. $action .';
  }
  ]]> </script>';

// Elements definition
echo '<defs>';

// Button
$buttonFile = '../images/button_'. $_GET["c"] .'.svg';
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

// Background color
if(isset($_GET['paintbg']))
  echo '<g><rect id="bg" name="bg" fill="'.$paintbg.'" width="100%" height="100%"/></g>';
else
  echo '<g><rect id="bg" name="bg" fill="'.$paintbg.'" style="display:none" width="100%" height="100%"/></g>';
	     
// Render elements
echo '<use id="button1" xlink:href="#button" x="'.($width-90)/2 .'" y="0"/>';
echo '<use id="icon1" xlink:href="#icon" x="'.($width-64)/2 .'" y="13"/>';
echo '<use id="txt1" xlink:href="#text" x="'.$width/2 .'" y="100" />';

// SVG end
echo '</g></a></svg>';
?>
