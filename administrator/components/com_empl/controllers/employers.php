<?php
use Joomla\CMS\MVC\Controller\AdminController;
defined('_JEXEC') or die;

class EmplControllerEmployers extends AdminController
{
    public function download(): void
    {
        echo "<script>window.open('index.php?option=com_empl&task=employers.execute&format=xls');</script>";
        echo "<script>location.href='{$_SERVER['HTTP_REFERER']}'</script>";
        jexit();
    }

    public function getModel($name = 'Employer', $prefix = 'EmplModel', $config = array())
    {
        return parent::getModel($name, $prefix, array('ignore_request' => true));
    }
}
