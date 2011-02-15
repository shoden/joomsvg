<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php if($showlink){ ?>

<div id="<?php echo $svgdiv; ?>">
<?php

 // include_once('funciones.php');

	$data = "modules/mod_svgbacklink/tmpl/svg.link.php?w=" . $svgwidth
		    . "&h=" . $svgheight . "&i=" . $svgimg;
        
  $svg = '<object id="mysvgbacklink" type="image/svg+xml" data="'. $data
        .'" height="'. $svgsize .'%" width="'. $svgsize .'%">
        <param name="wmode" value="transparent">
        </object>
        ';

	echo $svg;

?>
</div>
<?php } ?>
