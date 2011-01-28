<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php //echo JText::_('ELEMENTS'); ?>
<?php //echo JText::sprintf('ICON', $item->name); ?>
<script type="text/javascript" src="modules/mod_svgmenu/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="modules/mod_svgmenu/js/funciones.js"></script>
<div id="capa0">
<?php

    include_once('funciones.php');

	// Up button space
  $spacesvg = "modules/mod_svgmenu/tmpl/svg.spacebutton.php?bg=" . $bg;
	echo space($iconsize, "button-up", $spacesvg); 
	echo space($iconmargin, "space-up", $spacesvg);

	// Menu buttons
	for($i=0; $i<count($items) && $i<4; $i++) {
		$icontype = ($items[$i]->link=="#") ? 0 : 1;
		$svg = "modules/mod_svgmenu/tmpl/svg.menubutton.php?w=" . $iconwidth
		    . "&h=" . $iconheight . "&c=" . $colors[$i] . "&t=" . 
		    $items[$i]->name . "&i=" . $items[$i]->img . "&ts=" . 
		    $iconfontsize . "&blink=" . urlencode(JURI::base()) ."&link=" . 
		    urlencode($items[$i]->link) . "&y=" . $icontype . "&id=" . $items[$i]->id .
		    "&is=" . $iconsize . "&l=1&bg=" . $bg;
	
		echo button($i, $svg, $iconsize);
		echo space($iconmargin, "space-".$i, $spacesvg);
	}

	// Filling spaces
	for($i=$i; $i<4; $i++){
		echo space($iconsize, "button-".$i, $spacesvg); 
		echo space($iconmargin, "space-".$i, $spacesvg); 
	}
	
	// More button
	$svg = "modules/mod_svgmenu/tmpl/svg.morebutton.php?w=" . $iconwidth
	     . "&h=" . $iconheight . "&t=" . "Más" . "&ts=" . $iconfontsize
	     . "&l=0" . "&total=". ceil(count($items)/4) . "&current=1&bg=" . $bg;
	echo button( "more", $svg, $iconsize );
?>
</div>
<div id="capa1"></div>
<div id="capa2"></div>
<div id="capa3"></div>
