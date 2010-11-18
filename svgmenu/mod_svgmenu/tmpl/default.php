<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php //echo JText::_('ELEMENTS'); ?>
<?php //echo JText::sprintf('ICON', $item->name); ?>
<script type="text/javascript" src="modules/mod_svgmenu/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="modules/mod_svgmenu/js/funciones.js"></script>

<?php for($i=0; $i<count($items); $i++) { //$i=0; foreach($items as $item){ ?>

	  <!-- button -->
	  <object type="image/svg+xml" data="modules/mod_svgmenu/images/button_blue.svg"
	  height="<?php echo $iconsize; ?>%" width="<?php echo $iconsize; ?>%">
		<param name="src" value="boton1.svg">
		<param name="wmode" value="transparent">
		<param name="name" value="<?php echo $items[$i]->name; ?>">
		<param name="link" value="<?php echo JURI::base() . $items[$i]->link; ?>">
	  </object>
	  
	  <!-- space -->
	  <?php if($i < (count($items)-1)){ ?>
	  <object type="image/svg+xml" data="modules/mod_svgmenu/images/blank.svg"
	    height="<?php echo $iconmargin; ?>%" width="<?php echo $iconmargin; ?>%">
		<param name="src" value="blank.svg">
		<param name="wmode" value="transparent">
	  </object>
	  <?php } ?>

<?php } ?>

