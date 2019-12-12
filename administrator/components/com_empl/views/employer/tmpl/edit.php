<?php
defined('_JEXEC') or die;
JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
JHtml::_('formbehavior.chosen', 'select');

use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('script', $this->script);
HTMLHelper::_('script', 'com_empl/employer.js', array('version' => 'auto', 'relative' => true));
?>
<script type="text/javascript">
    Joomla.submitbutton = function (task) {
        if (task === 'employer.cancel' || document.formvalidator.isValid(document.id('adminForm'))) {
            Joomla.submitform(task, document.getElementById('adminForm'));
        }
    }
</script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<form action="<?php echo EmplHelper::getActionUrl(); ?>"
      method="post" name="adminForm" id="adminForm" xmlns="http://www.w3.org/1999/html" class="form-validate">
    <div class="row-fluid">
        <div class="span12 form-horizontal">
            <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general', 'useCookie' => true)); ?>
            <div class="tab-content">
                <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::sprintf('COM_EMPL_TAB_EMPLOYER_GENERAL')); ?>
                <div class="row-fluid">
                    <div class="span6">
                        <div>
                            <?php echo $this->loadTemplate('general'); ?>
                        </div>
                        <div>
                            <?php echo $this->loadTemplate('addresses'); ?>
                        </div>
                        <div>
                            <?php echo $this->loadTemplate('experience'); ?>
                        </div>
                    </div>
                    <div class="span6">
                        <div>
                            <?php echo $this->loadTemplate('contacts'); ?>
                        </div>
                        <div>
                            <?php echo $this->loadTemplate('documents'); ?>
                        </div>
                    </div>
                </div>
                <?php echo JHtml::_('bootstrap.endTab'); ?>
                <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'about', JText::sprintf('COM_EMPL_TAB_EMPLOYER_ABOUT')); ?>
                <div class="row-fluid">
                    <div class="span6">
                        <div>
                            <?php echo $this->loadTemplate('about_left'); ?>
                        </div>
                    </div>
                    <div class="span6">
                        <div>
                            <?php echo $this->loadTemplate('about_right'); ?>
                        </div>
                    </div>
                </div>
                <?php echo JHtml::_('bootstrap.endTab'); ?>
            </div>
            <?php echo JHtml::_('bootstrap.endTabSet'); ?>
        </div>
        <div>
            <input type="hidden" name="task" value=""/>
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </div>
</form>

