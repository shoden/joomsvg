<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php //echo JText::_('ELEMENTS'); ?>
<?php //echo JText::sprintf('ICON', $item->name); ?>
<script type="text/javascript" src="modules/mod_svgmenu/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="modules/mod_svgmenu/js/funciones.js"></script>

<table border=1>
	<tr>
		<td><a onclick="hola()" href="#">parent</a></td>
		<td>id</td>
		<td>name</td>
		<td>link</td>
		<td>type</td>
		<td>img</td>
	</tr>
    <?php $i=0; foreach ($items as $item) { ?>
    <tr>
      <td><?php echo $item->parent;   ?></td> 
      <td><?php echo $item->id;   ?></td> 
      <td><?php echo $item->name;   ?></td> 
      <td><?php echo $item->link;   ?></td> 
      <td><?php echo $item->type;   ?></td> 
      <td><?php echo $item->img;   ?></td> 
    </tr>
    <?php //if(++$i%4==0) echo "<tr><td><br/><br/></td></tr>"; ?>
    <?php } ?>
</table>

<div id="debug"></div>

<center>
<div id="wrapper">
	<div id="menu">
	<div class="boton">
      <object id="svgid" data="modules/mod_svgmenu/images/boton1.svg" 
        type="image/svg+xml" wmode="transparent" style="overflow: hidden;"
        height="208.75" width="208.75">
        <param name="src" value="boton1.svg" wmode="transparent" type="image/svg+xml">
        Este navegador no tiene soporte para SVG. <br>
        Puedes descargar <a href="http://getfirefox.com/">Firefox</a> o instalar el 
        <a href="http://www.adobe.com/svg/viewer/install/main.html">plugin de SVG
        para Internet explorer</a>.
     </object>
	</div>
	</div>
</div>

</center>
