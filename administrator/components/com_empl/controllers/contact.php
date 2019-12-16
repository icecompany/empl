<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\FormController;

class EmplControllerContact extends FormController {
    public function display($cachable = false, $urlparams = array())
    {
        return parent::display($cachable, $urlparams);
    }

    public function add()
    {
        $input = $this->input;
        $employerID = $input->getInt('employerID', 0);
        if ($employerID > 0) {
            JFactory::getApplication()->setUserState("{$this->option}.employerID", $employerID);
        }
        return parent::add();
    }

    public function forceDelete()
    {
        $input = $this->input;
        $contactID = $input->getInt('contactID', 0);

        if ($contactID > 0)
        {
            $model = $this->getModel();
            $model->delete($contactID);
        }

        $msg = JText::sprintf('COM_EMPL_MSG_CONTACT_DELETED');
        $url = $_SERVER['HTTP_REFERER'];
        $this->setRedirect($url, $msg, 'success');
        $this->redirect();
        jexit();
    }

    public function getModel($name = 'Contact', $prefix = 'EmplModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}