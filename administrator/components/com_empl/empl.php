<?php
use Joomla\CMS\MVC\Controller\BaseController;

defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_empl'))
{
	throw new InvalidArgumentException(JText::sprintf('JERROR_ALERTNOAUTHOR'), 404);
}

// Require the helper
require_once JPATH_COMPONENT_ADMINISTRATOR . '/helpers/empl.php';
require_once JPATH_LIBRARIES . '/AWS/aws-autoloader.php';
require_once JPATH_LIBRARIES . '/classSimpleImage.php';
require_once JPATH_ADMINISTRATOR . '/components/com_yastorage/helpers/yastorage.php';

require_once JPATH_COMPONENT_ADMINISTRATOR . '/passwd.php';
$db = JFactory::getDbo();
$passwd = $db->q($credentials->password);
$db->setQuery("SELECT @password:={$passwd}")->execute();

// Execute the task
$controller = BaseController::getInstance('empl');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
