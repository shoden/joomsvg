<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<div id="<?php echo $svgdiv; ?>">
<?php

 // include_once('funciones.php');

	$data = "modules/mod_svglink/tmpl/svg.link.php?w=" . $svgwidth
		    . "&h=" . $svgheight . "&i=" . $svgimg  ."&l="
        . urlencode($svglink);
        
  $svg = '<object id="mysvglink" type="image/svg+xml" data="'. $data
        .'" height="'. $svgsize .'%" width="'. $svgsize .'%">
        <param name="wmode" value="transparent">
        </object>
        ';
	
	echo $svg;

?>
</div>
