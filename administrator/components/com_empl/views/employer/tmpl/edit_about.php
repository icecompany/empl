<?php
defined('_JEXEC') or die;
?>
<div style="text-align: center;"><h2><?php echo JText::sprintf('COM_EMPL_LAYOUT_EMPLOYER_ABOUT');?></h2></div>
<fieldset class="adminform">
    <div class="control-group form-inline">
        <?php foreach ($this->form->getFieldset('about_left') as $field) :
            echo $field->renderField();
        endforeach; ?>
    </div>
</fieldset>
<fieldset class="adminform">
    <div class="control-group form-inline">
        <?php foreach ($this->form->getFieldset('about_right') as $field) :
            echo $field->renderField();
        endforeach; ?>
    </div>
</fieldset>
