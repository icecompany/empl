<?php
use Joomla\CMS\MVC\Model\ListModel;
defined('_JEXEC') or die;

class EmplModelDocuments extends ListModel
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'employerID',
            );
        }
        $this->export = false;
        parent::__construct($config);
    }

    protected function _getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("id, tip")
            ->select("if(series is not null, cast(aes_decrypt(series, @password) as char(255)), '') as series")
            ->select("if(num is not null, cast(aes_decrypt(num, @password) as char(255)), '') as num")
            ->select("if(dat is not null, cast(aes_decrypt(dat, @password) as char(255)), '') as dat")
            ->select("if(issued is not null, cast(aes_decrypt(issued, @password) as char(255)), '') as issued")
            ->select("if(address is not null, cast(aes_decrypt(address, @password) as char(255)), '') as address")
            ->select("if(city is not null, cast(aes_decrypt(city, @password) as char(255)), '') as city")
            ->from("#__empl_documents d")
            ->where("employerID = {$this->employerID}");
        $this->setState('list.limit', 0);

        return $query;
    }

    public function getItems()
    {
        $items = parent::getItems();
        $result = array();
        $return = EmplHelper::getReturnUrl();
        foreach ($items as $item) {
            $arr = array();
            $arr['id'] = $item->id;
            $arr['tip'] = JText::sprintf("COM_EMPL_FORM_DOCUMENT_TYPE_{$item->tip}");
            $arr['series'] = $item->series;
            $arr['num'] = $item->num;
            $arr['dat'] = ($item->dat != null) ? JFactory::getDate($item->dat)->format("d.m.Y") : '';
            $arr['issued'] = $item->issued;
            $arr['city'] = $item->city;
            $arr['address'] = $item->address;
            $url = JRoute::_("index.php?option=com_empl&amp;task=document.edit&amp;id={$item->id}&amp;return={$return}");
            $arr['edit_link'] = JHtml::link($url, JText::sprintf('COM_EMPL_HEAD_ACTION_EDIT'));
            $result[] = $arr;
        }
        return $result;
    }

    public function setEmployerID(int $employerID)
    {
        $this->employerID = $employerID;
        return $this;
    }

    private $export, $employerID;

}