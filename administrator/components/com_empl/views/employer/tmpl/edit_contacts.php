<?php
defined('_JEXEC') or die;
?>
<div style="text-align: center;"><h2><?php echo JText::sprintf('COM_EMPL_LAYOUT_EMPLOYER_CONTACTS');?></h2></div>
    <?php
    if ($this->item->id == null) {
        echo JText::sprintf('COM_EMPL_MSG_SAVE_EMPLOYER_FOR_ADD_CONTACT');
        return;
    }
    $url = JRoute::_("index.php?option=com_empl&amp;task=contact.add&amp;employerID={$this->item->id}&amp;return={$this->return}");
    echo JHtml::link($url, JText::sprintf('COM_EMPL_ACTION_ADD_CONTACT'));
    ?>
<div>
    <table class="table table-stripped">
        <thead>
            <tr>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_CONTACT_VALUE');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_CONTACT_DESCRIPTION');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_ACTION_EDIT');?></th>
                <th><?php echo JText::sprintf('COM_EMPL_HEAD_ACTION_DELETE');?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->contacts as $contact) :?>
                <tr>
                    <td><?php echo $contact['val'];?></td>
                    <td><?php echo $contact['description'];?></td>
                    <td><?php echo $contact['edit_link'];?></td>
                    <td><?php echo $contact['delete_link'];?></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
