<?php
defined('_JEXEC') or die;
if ($this->item->id == null) {
    echo JText::sprintf('COM_EMPL_MSG_SAVE_EMPLOYER_FOR_ADD_CONTACT');
    return;
}
?>
<div>
    <?php
    $url = JRoute::_("index.php?option=com_empl&amp;task=contact.add&amp;employerID={$this->item->id}&amp;return={$this->return}");
    echo JHtml::link($url, JText::sprintf('COM_EMPL_ACTION_ADD_CONTACT'));
    ?>
</div>
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
            <?php foreach ($this->item->contacts as $contact) :?>
                <tr>
                    <td><?php echo $contact['val'];?></td>
                    <td><?php echo $contact['description'];?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
