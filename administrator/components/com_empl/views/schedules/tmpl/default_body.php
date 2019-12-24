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
            <?php echo $item['last_name'];?>
        </td>
        <td>
            <?php echo $item['first_name'];?>
        </td>
        <td>
            <?php echo $item['patronymic'];?>
        </td>
        <td>
            <?php echo $item['gender'];?>
        </td>
        <td>
            <?php echo $item['birthday'];?>
        </td>
        <td>
            <?php echo $item['age'];?>
        </td>
        <td>
            <?php echo $item['metro'];?>
        </td>
        <td>
            <?php echo $item['city'];?>
        </td>
        <td>
            <?php echo $item['id'];?>
        </td>
    </tr>
<?php endforeach; ?>