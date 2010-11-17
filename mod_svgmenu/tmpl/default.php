<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php echo JText::_('ELEMENTS'); ?>
<?php //echo JText::sprintf('ICON', $item->name); ?>

<table border=1>
    <?php $i=0; foreach ($items as $item) { ?>
    <tr>
      <td><?php echo $item->name;   ?></td> 
      <td><?php echo nl2br($item->params); ?></td>
    </tr>
    <?php if(++$i%4==0) echo "<tr><td><br/><br/></td></tr>"; ?>
    <?php } ?>
</table>
