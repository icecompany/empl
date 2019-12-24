<?php
use Joomla\CMS\MVC\Controller\AdminController;
defined('_JEXEC') or die;

class EmplControllerSchedules extends AdminController
{
    public function getModel($name = 'Schedule', $prefix = 'EmplModel', $config = array())
    {
        return parent::getModel($name, $prefix, array('ignore_request' => true));
    }
}
