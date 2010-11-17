<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php //echo JText::_('ELEMENTS'); ?>
<?php //echo JText::sprintf('ICON', $item->name); ?>
<script type="text/javascript" src="modules/mod_svgmenu/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="modules/mod_svgmenu/js/funciones.js"></script>

<?php $i=0; foreach($items as $item){ ?>
	  <object type="image/svg+xml" data="modules/mod_svgmenu/images/boton_<?php echo $colors[$i++]; ?>.svg" height="<?php echo $iconsize; ?>%" width="<?php echo $iconsize; ?>%">
		<param name="src" value="boton1.svg">
		<param name="wmode" value="transparent">
	  </object>
<?php } ?>
</table>
