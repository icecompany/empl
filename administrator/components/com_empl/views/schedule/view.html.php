<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView;

class EmplViewSchedule extends HtmlView {
    protected $item, $form, $script, $return;

    public function display($tmp = null) {
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->script = $this->get('Script');

        $this->addToolbar();
        $this->setDocument();

        parent::display($tpl);
    }

    protected function addToolbar() {
        JToolbarHelper::title(JText::sprintf('COM_EMPL_TITLE_SCHEDULE'), '');
	    JToolBarHelper::apply('schedule.apply', 'JTOOLBAR_APPLY');
        JToolbarHelper::save('schedule.save', 'JTOOLBAR_SAVE');
        JToolbarHelper::cancel('schedule.cancel', 'JTOOLBAR_CLOSE');
    }

    protected function setDocument() {
        JHtml::_('bootstrap.framework');
    }
}