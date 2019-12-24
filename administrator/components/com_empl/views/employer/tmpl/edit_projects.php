<?php
defined('_JEXEC') or die;
?>
<div style="text-align: center;"><h2><?php echo JText::sprintf('COM_EMPL_LAYOUT_EMPLOYER_PROJECTS');?></h2></div>
    <?php
    if ($this->item->id == null) {
        echo JText::sprintf('COM_EMPL_MSG_SAVE_EMPLOYER_FOR_ADD_PROJECTS');
        return;
    }
    $url = JRoute::_("index.php?option=com_empl&amp;task=work.add&amp;employerID={$this->item->id}&amp;return={$this->return}");
    echo JHtml::link($url, JText::sprintf('COM_EMPL_ACTION_ADD_TO_PROJECT'));
    ?>
<div>
    <table class="table table-stripped">
        <thead>
        <tr>
            <th><?php echo JText::sprintf('COM_EMPL_HEAD_EMPLOYER_WORK_PROJECT');?></th>
            <th><?php echo JText::sprintf('COM_EMPL_HEAD_EMPLOYER_WORK_STATUS');?></th>
            <th><?php echo JText::sprintf('COM_EMPL_HEAD_EMPLOYER_WORK_DATE');?></th>
            <th><?php echo JText::sprintf('COM_EMPL_HEAD_EMPLOYER_WORK_SCHEDULE');?></th>
            <th><?php echo JText::sprintf('COM_EMPL_HEAD_ACTION_EDIT');?></th>
            <th><?php echo JText::sprintf('COM_EMPL_HEAD_ACTION_DELETE');?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->works as $work) :?>
            <tr>
                <td><?php echo $work['project'];?></td>
                <td><?php echo $work['status'];?></td>
                <td><?php echo $work['dat'];?></td>
                <td><?php echo $work['schedule_link'];?></td>
                <td><?php echo $work['edit_link'];?></td>
                <td><?php echo $work['delete_link'];?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>