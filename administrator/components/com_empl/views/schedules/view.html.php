<?php
use Joomla\CMS\MVC\View\HtmlView;

defined('_JEXEC') or die;

class EmplViewSchedules extends HtmlView
{
	protected $helper;
	protected $sidebar = '';
	public $items, $pagination, $uid, $state, $links, $filterForm, $activeFilters, $workID;

	public function display($tpl = null)
	{
	    $this->items = $this->get('Items');
	    $this->pagination = $this->get('Pagination');
	    $this->state = $this->get('State');
        $this->filterForm = $this->get('FilterForm');
        $this->activeFilters = $this->get('ActiveFilters');
        $this->workID = $this->get('WorkID');

        // Show the toolbar
		$this->toolbar();

		// Show the sidebar
		$this->helper = new EmplHelper();
		$this->helper->addSubmenu('schedules');
		$this->sidebar = JHtmlSidebar::render();

		// Display it all
		return parent::display($tpl);
	}

	private function toolbar()
	{
	    $title = $this->get('Title');
		JToolBarHelper::title($title, 'calendar');

        if (EmplHelper::canDo('core.create'))
        {
            JToolbarHelper::addNew('schedule.add');
        }
        if (EmplHelper::canDo('core.edit'))
        {
            JToolbarHelper::editList('schedule.edit');
        }
        if (EmplHelper::canDo('core.delete'))
        {
            JToolbarHelper::deleteList('COM_EMPL_REMOVE_QUESTION_EMPLOYER', 'schedules.delete');
        }
        if ($this->workID > 0) {
            JToolbarHelper::custom('schedules.reset', 'calendar-2', '', JText::sprintf('COM_EMPL_ACTION_RESET_WORK_ID'), false);
        }
		if (EmplHelper::canDo('core.admin'))
		{
			JToolBarHelper::preferences('com_empl');
		}
	}
}
