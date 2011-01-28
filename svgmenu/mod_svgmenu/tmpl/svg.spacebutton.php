<?php header("Content-type: image/svg+xml");

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?> ';

$bg = (isset($_GET['bg'])) ? "#".$_GET['bg'] : "transparent";
$paintbg = (isset($_GET['paintbg'])) ? $bg : "transparent";

// SVG header
echo '<svg xmlns="http://www.w3.org/2000/svg" 
    xmlns:xlink="http://www.w3.org/1999/xlink"
    xmlns:svg="http://www.w3.org/2000/svg"
    xml:space="preserve"
    id="space_button"
    x="0px" y="0px" width="100%" height="100%"
    viewBox="0 0 1 1"
    >';

// Background function
echo '<script type="application/ecmascript"> <![CDATA[
      function changeBg(){
        document.getElementById("bg").setAttributeNS(null,"fill","'.$bg.'");
      }
      ]]> </script>';

echo '<g id="Layer_1"><rect id="bg" name="bg" fill-rule="evenodd" clip-rule="evenodd" fill="'.$paintbg.'" width="100%" height="100%"/></g>';
  
echo '</svg>';
