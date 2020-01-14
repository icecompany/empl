<?php
// Запрет прямого доступа.
defined('_JEXEC') or die;
$ii = JFactory::getApplication()->input->getInt('limitstart', 0);
foreach ($this->items['items'] as $i => $item) :
    ?>
    <tr class="row0">
        <td class="center">
            <?php echo JHtml::_('grid.id', $i, $item['id']); ?>
        </td>
        <td>
            <?php echo ++$ii; ?>
        </td>
        <td>
            <?php echo $item['fio'];?>
        </td>
        <td>
            <?php echo $item['project'];?>
        </td>
        <td>
            <?php echo $item['function'];?>
        </td>
        <td>
            <?php echo $item['place'];?>
        </td>
        <td>
            <?php echo $item['start_time'];?>
        </td>
        <td>
            <?php echo $item['end_time'];?>
        </td>
        <td>
            <?php echo $item['curator'];?>
        </td>
        <td>
            <?php echo $item['comment'];?>
        </td>
        <td>
            <?php echo $item['id'];?>
        </td>
    </tr>
<?php endforeach; ?>