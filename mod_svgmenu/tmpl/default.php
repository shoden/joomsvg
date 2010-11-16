<?php defined('_JEXEC') or die('Restricted access'); // no direct access ?>
<?php echo JText::_('ELEMENTS'); ?>
<ul>
    <?php $i=0; foreach ($items as $item) { ?>
    <li>
        <?php echo JText::sprintf('ICON', $item->name); ?>
    <?php if(++$i%4==0) echo "<br/>"; ?>
    </li>
    <?php } ?>
</ul>
