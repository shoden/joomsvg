<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php //echo JText::_('ELEMENTS'); ?>
<?php //echo JText::sprintf('ICON', $item->name); ?>
<script type="text/javascript" src="modules/mod_svgmenu/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="modules/mod_svgmenu/js/funciones.js"></script>
<?php
		space($iconsize); 
		space($iconmargin);	

	// Menu buttons
	for($i=0; $i<count($items) && $i<4; $i++) {

	$svg = "modules/mod_svgmenu/tmpl/svg.menubutton.php?w=" . $iconwidth
	     . "&h=" . $iconheight . "&c=" . $colors[$i] . "&t=" . 
	     $items[$i]->name . "&i=" . $items[$i]->img . "&ts=" . 
	     $iconfontsize . "&link=" . urlencode(JURI::base() . $items[$i]->link);
	
		button($i, $svg, $iconsize);
		space($iconmargin);
	}

	// Filling spaces
	for($i=$i; $i<4; $i++){
		space($iconsize); 
		space($iconmargin); 
	}
	
	// More button
	$svg = "modules/mod_svgmenu/tmpl/svg.morebutton.php?w=" . $iconwidth
	     . "&h=" . $iconheight . "&t=" . "Más" . "&ts=" . 
	     $iconfontsize; //. "&link=" . $items[$i]->link	
	button( "more", $svg, $iconsize);
	?>
	
	
