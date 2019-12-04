<?php
use Joomla\CMS\HTML\HTMLHelper;

defined('_JEXEC') or die;

class EmplHelper
{
	/**
	 * Render submenu.
	 *
	 * @param   string  $vName  The name of the current view.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function addSubmenu($vName)
	{
		JHtmlSidebar::addEntry(JText::sprintf('COM_EMPL_TITLE_EMPLOYERS'), 'index.php?option=com_empl&amp;view=employers', $vName === 'employers');
	}

    public static function getCityTitle(int $cityID)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("c.name as city, r.name as region")
            ->from("#__grph_cities c")
            ->leftJoin("#__grph_regions r on r.id = c.region_id")
            ->where("c.id = {$cityID}");
        $item = $db->setQuery($query, 0, 1)->loadObject();
        return sprintf("%s (%s)", $item->city, $item->region);
	}

    /**
     * Проверяет наличие указанных в массиве параметров в GET-запросе
     *
     * @param array $params массив с проверяемыми параметрами
     *
     * @return array|bool массив с найденными параметрами или false, если ни один элемент не найден
     *
     * @since version 1.0.0
     */
    public static function isGet(array $params = array())
    {
        $fnd = array();
        //Параметры, наличие которых проверяется в $_GET
        foreach ($params as $param) {
            if (isset($_GET[$param])) $fnd[] = $param;
        }
        return (!empty($fnd)) ? $fnd : false;
    }

    /**
     * Возвращает URL для обработки формы
     * @return string
     * @since 1.1.8.7
     * @throws
     */
    public static function getActionUrl(): string
    {
        $uri = JUri::getInstance();
        $query = $uri->getQuery();
        $client = (!JFactory::getApplication()->isClient('administrator')) ? 'site' : 'administrator';
        return JRoute::link($client, "index.php?{$query}");
    }

    /**
     * Возвращает текущий URL
     * @return string
     * @since 1.2.0.3
     * @throws
     */
    public static function getCurrentUrl(): string
    {
        $uri = JUri::getInstance();
        $query = $uri->getQuery();
        return "index.php?{$query}";
    }

    /**
     * Возвращает URL для возврата (текущий адрес страницы)
     * @return string
     * @since 1.1.8.7
     */
    public static function getReturnUrl(): string
    {
        $uri = JUri::getInstance();
        $query = $uri->getQuery();
        return base64_encode("index.php?{$query}");
    }

    /**
     * Возвращает URL для обработки формы левой панели
     * @return string
     * @since 1.2.0.3
     */
    public static function getSidebarAction():string
    {
        $return = self::getReturnUrl();
        return JRoute::_("index.php?return={$return}");
    }

    public static function canDo(string $action, string $section = 'com_empl'): bool
    {
        return JFactory::getUser()->authorise($action, $section);
    }
}
