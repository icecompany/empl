<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView;

class EmplViewEmployer extends HtmlView {
    protected $item, $form, $script, $id, $history, $coExhibitors, $persons, $children, $return;

    public function display($tmp = null) {
        $this->form = $this->get('Form');
        $this->item = $this->get('Item');
        $this->script = $this->get('Script');
        $this->return = EmplHelper::getReturnUrl();

        $this->addToolbar();
        $this->setDocument();

        parent::display($tpl);
    }

    protected function addToolbar() {
        $title = ($this->item->fio != null) ? $this->item->fio : JText::sprintf('COM_EMPL_TITLE_NEW_EMPLOYER');

        JToolbarHelper::title($title, '');
	    JToolBarHelper::apply('employer.apply', 'JTOOLBAR_APPLY');
        JToolbarHelper::save('employer.save', 'JTOOLBAR_SAVE');
        JToolbarHelper::cancel('employer.cancel', 'JTOOLBAR_CLOSE');
    }

    protected function setDocument() {
        JHtml::_('bootstrap.framework');
    }
}