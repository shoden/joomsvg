<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php //echo JText::_('ELEMENTS'); ?>
<?php //echo JText::sprintf('ICON', $item->name); ?>

<table border=1>
	<tr>
		<td>id</td>
		<td>parent</td>
		<td>name</td>
		<td>link</td>
		<td>type</td>
		<td>img</td>
	</tr>
    <?php $i=0; foreach ($items as $item) { ?>
    <tr>
      <td><?php echo $item->id;   ?></td> 
      <td><?php echo $item->parent;   ?></td> 
      <td><?php echo $item->name;   ?></td> 
      <td><?php echo $item->link;   ?></td> 
      <td><?php echo $item->type;   ?></td> 
      <td><?php echo $item->img;   ?></td> 
    </tr>
    <?php if(++$i%4==0) echo "<tr><td><br/><br/></td></tr>"; ?>
    <?php } ?>
</table>
