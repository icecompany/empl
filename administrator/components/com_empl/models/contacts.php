<?php
use Joomla\CMS\MVC\Model\ListModel;
defined('_JEXEC') or die;

class EmplModelContacts extends ListModel
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
            ->select("id, tip, description")
            ->select("cast(aes_decrypt(val, @password) as char(255)) as val")
            ->from("#__empl_contacts")
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
            $arr['tip'] = JText::sprintf("COM_EMPL_FORM_CONTACT_TYPE_{$item->tip}");
            $arr['description'] = $item->description;
            $arr['val'] = $item->val;
            $url = JRoute::_("index.php?option=com_empl&amp;task=contact.edit&amp;id={$item->id}&amp;return={$return}");
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