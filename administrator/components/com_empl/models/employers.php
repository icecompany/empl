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
                'tattoo',
                'piercing',
                'smoke',
                'smart',
                'language',
                'e.state',
            );
        }
        parent::__construct($config);
        $this->isGet = EmplHelper::isGet(array('gender', 'birthday', 'search', 'min_age', 'max_age', 'driver', 'car', 'tattoo', 'piercing', 'smoke', 'smart'));
        $this->input = JFactory::getApplication()->input;
        $this->export = $this->input->getString('format') != null;
        $this->heads = [
            'last_name' => 'COM_EMPL_HEAD_EMPLOYERS_LAST_NAME',
            'first_name' => 'COM_EMPL_HEAD_EMPLOYER_FIRST_NAME',
            'patronymic' => 'COM_EMPL_HEAD_EMPLOYER_PATRONYMIC',
            'gender' => 'COM_EMPL_HEAD_EMPLOYER_GENDER',
            'age' => 'COM_EMPL_HEAD_EMPLOYER_AGE',
            'metro' => 'COM_EMPL_HEAD_EMPLOYER_METRO',
            'city' => 'COM_EMPL_HEAD_EMPLOYER_CITY',
            'languages' => 'COM_EMPL_HEAD_EMPLOYER_LANGUAGES',
            'address' => 'COM_EMPL_HEAD_EMPLOYER_ADDRESS',
            'experience' => 'COM_EMPL_HEAD_EMPLOYER_EXPERIENCE',
            'height' => 'COM_EMPL_HEAD_EMPLOYER_HEIGHT',
            'weight' => 'COM_EMPL_HEAD_EMPLOYER_WEIGHT',
            'hair' => 'COM_EMPL_HEAD_EMPLOYER_HAIR',
            'night' => 'COM_EMPL_HEAD_EMPLOYER_NIGHT',
            'clothes_size' => 'COM_EMPL_HEAD_EMPLOYER_CLOTHES_SIZE',
            'foot_size' => 'COM_EMPL_HEAD_EMPLOYER_FOOT_SIZE',
            'smoke' => 'COM_EMPL_HEAD_EMPLOYER_SMOKE',
            'tattoo' => 'COM_EMPL_HEAD_EMPLOYER_TATTOO',
            'piercing' => 'COM_EMPL_HEAD_EMPLOYER_PIERCING',
            'driver' => 'COM_EMPL_HEAD_EMPLOYER_DRIVER',
            'car' => 'COM_EMPL_HEAD_EMPLOYER_CAR',
            'smart' => 'COM_EMPL_HEAD_EMPLOYER_SMART',
        ];
    }

    protected function _getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("e.*, date_format(from_days(datediff(curdate(), e.birthday)), '%Y')+0 as age")
            ->select("if(e.address is not null, cast(aes_decrypt(e.address, @password) as char(255)), '') as address")
            ->select("m.station as metro")
            ->select("c.name as city")
            ->select("h.title as hair")
            ->from("#__empl_employers e")
            ->leftJoin("`#__metro_view_stations` m on m.id = e.metroID")
            ->leftJoin("`#__grph_cities` c on c.id = e.cityID")
            ->leftJoin("#__empl_hair_colors h on h.id = e.hairID");
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
            $tattoo = $this->getState('filter.tattoo');
            $piercing = $this->getState('filter.piercing');
            $smoke = $this->getState('filter.smoke');
            $smart = $this->getState('filter.smart');
        }
        else {
            $search = $this->input->getString('search', '');
            $gender = $this->input->getString('gender', '');
            $min_age = $this->input->getString('min_age', '');
            $max_age = $this->input->getString('max_age', '');
            $driver = $this->input->getString('driver', '');
            $car = $this->input->getString('car', '');
            $tattoo = $this->input->getString('tattoo', '');
            $piercing = $this->input->getString('piercing', '');
            $smoke = $this->input->getString('smoke', '');
            $smart = $this->input->getString('smart', '');
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
        if (is_numeric($smoke)) {
            $smoke = $db->q($smoke);
            $query->where("e.smoke = {$smoke}");
        }
        if (is_numeric($smart)) {
            $smart = $db->q($smart);
            $query->where("e.smart = {$smart}");
        }
        if (is_numeric($tattoo)) {
            $tattoo = ($tattoo != 0) ? 'is not null' : 'is null';
            $query->where("e.tattoo {$tattoo}");
        }
        if (is_numeric($piercing)) {
            $piercing = ($piercing != 0) ? 'is not null' : 'is null';
            $query->where("e.piercing {$piercing}");
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

        $this->setState('list.limit', (!$this->export) ? $this->state->get('list.limit') : 0);

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
            $arr['address'] = $item->address;
            $arr['experience'] = $item->experience;
            $arr['height'] = $item->height;
            $arr['weight'] = $item->weight;
            $arr['hair'] = $item->hair;
            $arr['night'] = $item->night;
            $arr['clothes_size'] = $item->clothes_size;
            $arr['foot_size'] = $item->foot_size;
            $arr['smoke'] = JText::sprintf((!$item->smoke) ? 'JNO' : 'JYES');
            $arr['tattoo'] = $item->tattoo;
            $arr['piercing'] = $item->piercing;
            $arr['driver'] = JText::sprintf((!$item->driver) ? 'JNO' : 'JYES');
            $arr['car'] = JText::sprintf((!$item->car) ? 'JNO' : 'JYES');
            $arr['smart'] = JText::sprintf((!$item->smart) ? 'JNO' : 'JYES');
            $arr['languages'] = array();
            $result['items'][$item->id] = $this->prepare($arr);
        }
        $config = array('employerID' => array_keys($result['items']), 'columns' => array('employerID', 'languageID'), 'key' => 'employerID', 'val' => 'languageID');
        $languages_model = parent::getInstance('Languages', 'EmplModel', $config);
        $languages = $languages_model->getItems();
        foreach ($languages as $employerID => $language) $result['items'][$employerID]['languages'] = $language;
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

    public function export()
    {
        $items = $this->getItems();
        JLoader::discover('PHPExcel', JPATH_LIBRARIES);
        JLoader::register('PHPExcel', JPATH_LIBRARIES . '/PHPExcel.php');

        $xls = new PHPExcel();
        $xls->setActiveSheetIndex(0);
        $sheet = $xls->getActiveSheet();

        //Заголовки
        $j = 0;
        foreach ($this->heads as $item => $head) $sheet->setCellValueByColumnAndRow($j++, 1, JText::sprintf($head));

        $sheet->setTitle(JText::sprintf('COM_EMPL_TITLE_EMPLOYERS'));

        //Данные
        $row = 2; //Строка, с которой начнаются данные
        $col = 0;
        foreach ($items['items'] as $i => $item) {
            foreach ($this->heads as $elem => $head) {
                $sheet->setCellValueByColumnAndRow($col++, $row, $item[$elem]);
            }
            $col = 0;
            $row++;
        }
        header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: public");
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=Employers.xls");
        $objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel5');
        $objWriter->save('php://output');
        jexit();
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
        $tattoo = $this->getUserStateFromRequest($this->context . '.filter.tattoo', 'filter_tattoo', '', 'string');
        $this->setState('filter.tattoo', $tattoo);
        $piercing = $this->getUserStateFromRequest($this->context . '.filter.piercing', 'filter_piercing', '', 'string');
        $this->setState('filter.piercing', $piercing);
        $smoke = $this->getUserStateFromRequest($this->context . '.filter.smoke', 'filter_smoke', '', 'string');
        $this->setState('filter.smoke', $smoke);
        $smart = $this->getUserStateFromRequest($this->context . '.filter.smart', 'filter_smart', '', 'string');
        $this->setState('filter.smart', $smart);
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
        $id .= ':' . $this->getState('filter.tattoo');
        $id .= ':' . $this->getState('filter.piercing');
        $id .= ':' . $this->getState('filter.smoke');
        $id .= ':' . $this->getState('filter.smart');
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

    private $isGet, $input, $export, $heads;

}