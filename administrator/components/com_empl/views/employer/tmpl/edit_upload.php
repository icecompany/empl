<?php
defined('_JEXEC') or die;
?>
<div style="text-align: center;"><h2><?php echo JText::sprintf('COM_EMPL_LAYOUT_EMPLOYER_PHOTOS');?></h2></div>
<fieldset class="adminform">
    <div class="control-group form-inline">
        <?php foreach ($this->form->getFieldset('upload') as $field) :
            echo $field->renderField();
        endforeach; ?>
    </div>
</fieldset>
