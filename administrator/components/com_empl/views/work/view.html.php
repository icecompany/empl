<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView;

class EmplViewWork extends HtmlView {
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
        JToolbarHelper::title($this->item->title, '');
	    JToolBarHelper::apply('work.apply', 'JTOOLBAR_APPLY');
        JToolbarHelper::save('work.save', 'JTOOLBAR_SAVE');
        JToolbarHelper::cancel('work.cancel', 'JTOOLBAR_CLOSE');
    }

    protected function setDocument() {
        JHtml::_('bootstrap.framework');
    }
}