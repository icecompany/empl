<?php
use Joomla\CMS\MVC\Controller\AdminController;
defined('_JEXEC') or die;

class EmplControllerSchedules extends AdminController
{
    public function getModel($name = 'Schedule', $prefix = 'EmplModel', $config = array())
    {
        return parent::getModel($name, $prefix, array('ignore_request' => true));
    }

    public function display($cachable = false, $urlparams = array())
    {
        $input = $this->input;
        $workID = $input->getInt('workID', 0);
        if ($workID > 0) {
            JFactory::getApplication()->setUserState("{$this->option}.workID", $workID);
            $model = $this->getModel();
            $model->setState("{$this->option}.workID", $workID);
        }
        else
        {
            JFactory::getApplication()->setUserState("{$this->option}.workID", 0);
        }
        return parent::display($cachable, $urlparams);
    }

    /**
     * Сброс активного рабочего проекта юзера
     *
     * @since version 1.1.1
     */
    public function reset()
    {
        JFactory::getApplication()->setUserState("{$this->option}.workID", 0);
        $this->setRedirect("index.php?option={$this->option}&view=schedules");
        $this->redirect();
        jexit();
    }
}
