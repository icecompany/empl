<?php
defined('_JEXEC') or die;
?>
<div style="text-align: center;"><h2><?php echo JText::sprintf('COM_EMPL_LAYOUT_EMPLOYER_DOCUMENTS');?></h2></div>
    <?php
    if ($this->item->id == null) {
        echo JText::sprintf('COM_EMPL_MSG_SAVE_EMPLOYER_FOR_ADD_DOCUMENT');
        return;
    }
    $url = JRoute::_("index.php?option=com_empl&amp;task=document.add&amp;employerID={$this->item->id}&amp;return={$this->return}");
    echo JHtml::link($url, JText::sprintf('COM_EMPL_ACTION_ADD_DOCUMENT'));
    ?>
<div>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_DOCUMENT_TYPE');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_DOCUMENT_SERIES');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_DOCUMENT_NUMBER');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_DOCUMENT_DATE');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_DOCUMENT_ISSUED');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_ACTION_EDIT');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_ACTION_DELETE');?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->documents as $document) :?>
                <tr>
                    <td><?php echo $document['tip'];?></td>
                    <td><?php echo $document['series'];?></td>
                    <td><?php echo $document['num'];?></td>
                    <td><?php echo $document['dat'];?></td>
                    <td><?php echo $document['issued'];?></td>
                    <td><?php echo $document['edit_link'];?></td>
                    <td><?php echo $document['delete_link'];?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
