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
