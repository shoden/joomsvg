<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php //echo JText::_('ELEMENTS'); ?>
<?php //echo JText::sprintf('ICON', $item->name); ?>
<script type="text/javascript" src="modules/mod_svgmenu/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="modules/mod_svgmenu/js/funciones.js"></script>

<?php $i=0; foreach($items as $item){ ?>

	  <object type="image/svg+xml" data="modules/mod_svgmenu/images/button_blue.svg"
	  height="<?php echo $iconsize; ?>%" width="<?php echo $iconsize; ?>%">
		<param name="src" value="boton1.svg">
		<param name="wmode" value="transparent">
		<param name="name" value="<?php echo $item->name; ?>">
		<param name="link" value="<?php echo JURI::base() . $item->link; ?>">
	  </object>
	  
	  <object type="image/svg+xml" data="modules/mod_svgmenu/images/blank.svg"
	    height="<?php echo $iconmargin; ?>%" width="<?php echo $iconmargin; ?>%">
		<param name="src" value="blank.svg">
		<param name="wmode" value="transparent">
	  </object>

<?php } ?>

