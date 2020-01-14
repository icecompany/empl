<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\FormController;

class EmplControllerSchedule extends FormController {
    public function __construct($config = array())
    {
        parent::__construct($config);

        $uri = JUri::getInstance($_SERVER['HTTP_REFERER']);
        $task = JFactory::getApplication()->input->getString('task', '');
        $this->workID = ($task == 'add' || $task == 'edit') ? $uri->getVar('workID', 0) : JFactory::getApplication()->getUserStateFromRequest("{$this->option}.workID", 'workID');
        $this->url = "index.php?option={$this->option}&view=schedules";
    }
    public function add()
    {
        if ($this->workID > 0) JFactory::getApplication()->setUserState("{$this->option}.workID", $this->workID);
        return parent::add();
    }

    public function save($key = null, $urlVar = null)
    {
        $s1 = parent::save($key, $urlVar);
        if ($this->workID > 0)
        {
            $this->url .= "&workID={$this->workID}";
            $this->go();
        }
    }

    public function cancel($key = null)
    {
        if ($this->workID > 0)
        {
            $this->url .= "&workID={$this->workID}";
            $this->go();
        }
        return parent::cancel($key);
    }

    public function getModel($name = 'Schedule', $prefix = 'EmplModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }

    private function go()
    {
        $this->setRedirect($this->url);
        $this->redirect();
        jexit();
    }

    private $workID, $url;
}