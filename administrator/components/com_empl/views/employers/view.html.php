<?php
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class EmplViewEmployers extends HtmlView
{
	protected $helper;
	protected $sidebar = '';
	public $items, $pagination, $uid, $state, $links, $filterForm, $activeFilters;

	public function display($tpl = null)
	{
	    $this->items = $this->get('Items');
	    $this->pagination = $this->get('Pagination');
	    $this->state = $this->get('State');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');

        // Show the toolbar
		$this->toolbar();

		// Show the sidebar
		$this->helper = new EmplHelper();
		$this->helper->addSubmenu('employers');
		$this->sidebar = JHtmlSidebar::render();

		// Display it all
		return parent::display($tpl);
	}

	private function toolbar()
	{
		JToolBarHelper::title(JText::sprintf('COM_EMPL_TITLE_EMPLOYERS'), 'users');

        if (EmplHelper::canDo('core.create'))
        {
            JToolbarHelper::addNew('employer.add');
        }
        if (EmplHelper::canDo('core.edit'))
        {
            JToolbarHelper::editList('employer.edit');
        }
        if (EmplHelper::canDo('core.delete'))
        {
            JToolbarHelper::deleteList('COM_EMPL_REMOVE_QUESTION_EMPLOYER', 'employers.delete');
        }
        JToolbarHelper::custom('employers.download', 'download', 'download', JText::sprintf('COM_EMPL_BUTTON_EXPORT_TO_EXCEL'), false);
		if (EmplHelper::canDo('core.admin'))
		{
			JToolBarHelper::preferences('com_empl');
		}
	}
}
