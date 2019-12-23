<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Controller\FormController;

class EmplControllerWork extends FormController {
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
}