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
                'e.gender', 'gender',
                'e.birthday',
                'age', 'min_age', 'max_age',
                'metro',
                'city',
                'hair',
                'driver',
                'car',
                'language',
                'e.state',
            );
        }
        $this->isGet = EmplHelper::isGet(array('gender', 'birthday', 'search', 'min_age', 'max_age', 'driver', 'car'));
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
            ->select("m.station as metro")
            ->select("c.name as city")
            ->from("#__empl_employers e")
            ->leftJoin("`#__metro_view_stations` m on m.id = e.metroID")
            ->leftJoin("`#__grph_cities` c on c.id = e.cityID");
        if ($this->isGet === false) {
            $search = $this->getState('filter.search');
            $gender = $this->getState('filter.gender');
            $min_age = $this->getState('filter.min_age');
            $max_age = $this->getState('filter.max_age');
            $metro = $this->getState('filter.metro');
            $language = $this->getState('filter.language');
            $hair = $this->getState('filter.hair');
            $driver = $this->getState('filter.driver');
            $car = $this->getState('filter.car');
        }
        else {
            $search = $this->input->getString('search', '');
            $gender = $this->input->getString('gender', '');
            $min_age = $this->input->getString('min_age', '');
            $max_age = $this->input->getString('max_age', '');
            $driver = $this->input->getString('driver', '');
            $car = $this->input->getString('car', '');
        }
        if (!empty($search)) {
            $search = $db->q("%{$search}%");
            $query->where("(e.first_name LIKE {$search} or e.last_name LIKE {$search} or e.patronymic LIKE {$search})");
        }
        if (!empty($gender)) {
            $gender = $db->q($gender);
            $query->where("e.gender = {$gender}");
        }
        if (is_numeric($driver)) {
            $driver = $db->q($driver);
            $query->where("e.driver = {$driver}");
        }
        if (is_numeric($car)) {
            $car = $db->q($car);
            $query->where("e.car = {$car}");
        }
        if (is_numeric($min_age) || is_numeric($max_age)) {
            if (is_numeric($min_age) && is_numeric($max_age)) {
                $query->having("age between {$min_age} and {$max_age}");
            }
            if (is_numeric($min_age) && !is_numeric($max_age)) {
                $query->having("age >= {$min_age}");
            }
            if (!is_numeric($min_age) && is_numeric($max_age)) {
                $query->having("age <= {$max_age}");
            }
        }
        if (isset($metro) && is_array($metro) && !empty($metro) && count($metro) > 0) {
            $metro = implode(", ", $metro);
            $query->where("e.metroID in ({$metro})");
        }
        if (isset($hair) && is_array($hair) && !empty($hair) && count($hair) > 0) {
            $hair = implode(", ", $hair);
            $query->where("e.hairID in ({$hair})");
        }
        if (isset($language) && is_array($language) && !empty($language) && count($language) > 0) {
            $ids = $this->getLanguagesID($language);
            $ids = implode(", ", $ids);
            $query->where("e.id in ({$ids})");
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
            $arr['city'] = $item->city;
            $arr['metro'] = $item->metro;
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
        $gender = $this->getUserStateFromRequest($this->context . '.filter.gender', 'filter_gender', '', 'string');
        $this->setState('filter.gender', $gender);
        $min_age = $this->getUserStateFromRequest($this->context . '.filter.min_age', 'filter_min_age', '', 'string');
        $this->setState('filter.min_age', $min_age);
        $max_age = $this->getUserStateFromRequest($this->context . '.filter.max_age', 'filter_max_age', '', 'string');
        $this->setState('filter.max_age', $max_age);
        $metro = $this->getUserStateFromRequest($this->context . '.filter.metro', 'filter_metro', '');
        $this->setState('filter.metro', $metro);
        $language = $this->getUserStateFromRequest($this->context . '.filter.language', 'filter_language', '');
        $this->setState('filter.language', $language);
        $hair = $this->getUserStateFromRequest($this->context . '.filter.hair', 'filter_hair', '');
        $this->setState('filter.hair', $hair);
        $driver = $this->getUserStateFromRequest($this->context . '.filter.driver', 'filter_driver', '', 'string');
        $this->setState('filter.driver', $driver);
        $car = $this->getUserStateFromRequest($this->context . '.filter.car', 'filter_car', '', 'string');
        $this->setState('filter.car', $car);
        parent::populateState($ordering, $direction);
    }

    protected function getStoreId($id = '')
    {
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.gender');
        $id .= ':' . $this->getState('filter.min_age');
        $id .= ':' . $this->getState('filter.max_age');
        $id .= ':' . $this->getState('filter.metro');
        $id .= ':' . $this->getState('filter.language');
        $id .= ':' . $this->getState('filter.hair');
        $id .= ':' . $this->getState('filter.driver');
        $id .= ':' . $this->getState('filter.car');
        return parent::getStoreId($id);
    }

    protected function getLanguagesID(array $languages): array
    {
        if (empty($languages)) return array();
        $ids = implode(", ", $languages);
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("employerID")
            ->from("`#__empl_languages`")
            ->where("languageID in ({$ids})");
        return $db->setQuery($query)->loadColumn() ?? array();
    }

    private $isGet, $input, $export;

}