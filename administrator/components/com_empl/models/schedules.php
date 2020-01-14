<?php
use Joomla\CMS\MVC\Model\ListModel;
use Joomla\CMS\MVC\Model\AdminModel;
defined('_JEXEC') or die;

class EmplModelSchedules extends ListModel
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                's.id',
                'e.last_name',
                'dat',
                'p.title_ru',
                'f.title',
                's.start_time',
                's.end_time',
                'search',
            );
        }
        $this->isGet = EmplHelper::isGet(array('workID'));
        $this->input = JFactory::getApplication()->input;
        $this->export = false;
        parent::__construct($config);
    }

    protected function _getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("e.first_name, e.last_name, e.patronymic")
            ->select("p.title_ru as project")
            ->select("pl.title as place")
            ->select("f.title as function")
            ->select("s.*")
            ->from("#__empl_schedule s")
            ->leftJoin("`#__empl_work` w on w.id = s.workID")
            ->leftJoin("`#__prj_projects` p on p.id = w.projectID")
            ->leftJoin("`#__empl_functions` f on f.id = s.functionID")
            ->leftJoin("`#__empl_places` pl on pl.id = s.placeID")
            ->leftJoin("`#__empl_employers` e on e.id = w.employerID");
        if ($this->isGet === false) {
            $workID = $this->getState('filter.workID');
        }
        else {
            $workID = $this->input->getString('workID', '');
        }
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            $search = $db->q("%{$search}%");
            $query->where("(e.first_name LIKE {$search} or e.last_name LIKE {$search} or e.patronymic LIKE {$search})");
        }
        if (!empty($workID)) {
            $query->where("s.workID = {$workID}");
        }
        $dat = $this->getState('filter.dat');
        if (!empty($dat)) {
            $dat_1 = JDate::getInstance($dat)->setTime(0, 0, 0)->toSql();
            $dat_1 = $db->q($dat_1);
            $dat_2 = JDate::getInstance($dat)->setTime(23, 59, 59)->toSql();
            $dat_2 = $db->q($dat_2);
            $query->where("s.start_time > {$dat_1} and s.end_time < {$dat_2}");
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
            $arr['fio'] = EmplHelper::getEmployerFio($item->last_name, $item->first_name ?? '', $item->patronymic ?? '');
            $arr['project'] = $item->project;
            $arr['function'] = $item->function;
            $arr['place'] = $item->place;
            $arr['comment'] = $item->comment;
            $arr['curator'] = JText::sprintf((!$item->curator) ? 'JNO' : 'JYES');
            $start_time = JDate::getInstance($item->start_time);
            $arr['start_time'] = $start_time->format("d.m.Y H:i");
            $end_time = JDate::getInstance($item->end_time);
            $arr['end_time'] = $end_time->format("d.m.Y H:i");
            $result['items'][$item->id] = $this->prepare($arr);
        }
        return $result;
    }

    private function prepare(array $data): array
    {
        if ($this->export) return $data;
        $query = array("option" => $this->option, "task" => "schedule.edit", "id" => $data['id']);
        $url = JRoute::_("index.php?".http_build_query($query));
        $data['fio'] = JHtml::link($url, $data['fio']);

        return $data;
    }

    public function getTitle(): string
    {
        $workID = ($this->isGet === false) ? $this->getState('filter.workID', '') : $this->input->getString('workID', '');
        if (!empty($workID)) {
            $model = AdminModel::getInstance('Work', 'EmplModel');
            $item = $model->getItem($workID);
            $employerID = $item->employerID;
            $projectID = $item->projectID;
            $project = EmplHelper::getProjectTitle($projectID);
            $model = AdminModel::getInstance('Employer', 'EmplModel');
            $item = $model->getItem($employerID);
            $fio = EmplHelper::getEmployerFio($item->last_name, $item->first_name, $item->patronymic);
            return JText::sprintf('COM_EMPL_TITLE_SCHEDULES_EMPLOYER_IN_PROJECT', $fio, $project);
        }
        else {
            return JText::sprintf('COM_EMPL_TITLE_SCHEDULES');
        }
    }

    public function getWorkID()
    {
        return ($this->isGet === false) ? $this->getState('workID', 0) : JFactory::getApplication()->input->getInt('workID', 0);
    }

    /* Сортировка по умолчанию */
    protected function populateState($ordering = 'e.last_name', $direction = 'asc')
    {
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search', '', 'string');
        $this->setState('filter.search', $search);
        $workID = $this->getUserStateFromRequest($this->context . '.filter.workID', 'filter_workID', '', 'string');
        $this->setState('filter.workID', $workID);
        $dat = $this->getUserStateFromRequest($this->context . '.filter.dat', 'filter_dat', '', 'string');
        $this->setState('filter.dat', $dat);
        parent::populateState($ordering, $direction);
    }

    protected function getStoreId($id = '')
    {
        $id .= ':' . $this->getState('filter.search');
        $id .= ':' . $this->getState('filter.workID');
        $id .= ':' . $this->getState('filter.dat');
        return parent::getStoreId($id);
    }

    private $isGet, $input, $export;

}