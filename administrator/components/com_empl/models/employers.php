<?php
use Joomla\CMS\MVC\Model\ListModel;
defined('_JEXEC') or die;

class EmplModelEmployers extends ListModel
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'e.id',
                'e.last_name',
                'e.first_name',
                'e.patronymic',
                'e.gender',
                'e.birthday',
                'age',
                'e.state',
            );
        }
        $this->isGet = EmplHelper::isGet(array('last_name', 'first_name', 'gender', 'birthday', 'search'));
        $this->input = JFactory::getApplication()->input;
        $this->export = false;
        parent::__construct($config);
    }

    protected function _getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("e.*, date_format(from_days(datediff(curdate(), e.birthday)), '%Y')+0 as age")
            ->from("#__empl_employers e");
        if ($this->isGet === false) {
            $search = $this->getState('filter.search');
        }
        else {
            $search = $this->input->getString('search', '');
        }
        if (!empty($search)) {
            $search = $db->q("%{$search}%");
            $query->where("(e.first_name LIKE {$search} or e.last_name LIKE {$search} or e.patronymic LIKE {$search})");
        }

        /* Сортировка */
        $orderCol = $this->state->get('list.ordering');
        $orderDirn = $this->state->get('list.direction');
        $query->order($db->escape($orderCol . ' ' . $orderDirn));

        return $query;
    }

    public function getItems()
    {
        $items = parent::getItems();
        $result = array('items' => array(), 'total' => array());
        foreach ($items as $item)
        {
            $arr = array();
            $arr['id'] = $item->id;
            $arr['last_name'] = $item->last_name;
            $arr['first_name'] = $item->first_name;
            $arr['patronymic'] = $item->patronymic;
            $arr['gender'] = JText::sprintf("COM_EMPL_HEAD_EMPLOYER_GENDER_{$item->gender}");
            $birthday = JDate::getInstance($item->birthday);
            $arr['birthday'] = $birthday->format("d.m.Y");
            $arr['age'] = $item->age;
            $arr['state'] = $item->state;
            $result['items'][] = $this->prepare($arr);
        }
        return $result;
    }

    private function prepare(array $data): array
    {
        if ($this->export) return $data;
        $query = array("option" => $this->option, "task" => "employer.edit", "id" => $data['id']);
        $url = JRoute::_("index.php?".http_build_query($query));
        $data['last_name'] = JHtml::link($url, $data['last_name']);

        return $data;
    }

    /* Сортировка по умолчанию */
    protected function populateState($ordering = 'e.last_name', $direction = 'asc')
    {
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search', '', 'string');
        $this->setState('filter.search', $search);
        parent::populateState($ordering, $direction);
    }

    protected function getStoreId($id = '')
    {
        $id .= ':' . $this->getState('filter.search');
        return parent::getStoreId($id);
    }

    private $isGet, $input, $export;

}