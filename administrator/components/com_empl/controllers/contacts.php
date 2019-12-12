<?php
use Joomla\CMS\MVC\Controller\AdminController;
defined('_JEXEC') or die;

class EmplControllerContacts extends AdminController
{
    public function getModel($name = 'Contact', $prefix = 'ProjectsModel', $config = array())
    {
        return parent::getModel($name, $prefix, array('ignore_request' => true));
    }
}
