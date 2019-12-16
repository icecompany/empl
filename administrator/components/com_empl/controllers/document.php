<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\FormController;

class EmplControllerDocument extends FormController {
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
        $documentID = $input->getInt('documentID', 0);

        if ($documentID > 0)
        {
            $model = $this->getModel();
            $model->delete($documentID);
        }

        $msg = JText::sprintf('COM_EMPL_MSG_DOCUMENT_DELETED');
        $url = $_SERVER['HTTP_REFERER'];
        $this->setRedirect($url, $msg, 'success');
        $this->redirect();
        jexit();
    }

    public function getModel($name = 'Document', $prefix = 'EmplModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}