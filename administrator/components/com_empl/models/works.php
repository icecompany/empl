<?php
use Joomla\CMS\MVC\Model\ListModel;
defined('_JEXEC') or die;

class EmplModelWorks extends ListModel
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
        if (isset($config['employerID'])) $this->employerID = (int) $config['employerID'];
        parent::__construct($config);
    }

    protected function _getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("w.id, w.employerID, w.status, w.dat, w.comment")
            ->select("w.projectID, p.title_ru as project")
            ->select("w.employerID, e.last_name as employer")
            ->from("#__empl_work w")
            ->leftJoin("#__prj_projects p on p.id = w.projectID")
            ->leftJoin("#__empl_employers e on e.id = w.employerID");
        if ($this->employerID != null) {
            $query->where("w.employerID = {$this->employerID}");
            $this->setState('list.limit', 0);
        }

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
            $arr['status'] = JText::sprintf("COM_EMPL_FORM_WORK_STATUS_{$item->status}");
            $arr['comment'] = $item->comment;
            $arr['project'] = $item->project;
            $arr['employer'] = $item->employer;
            if ($item->dat != null) $arr['dat'] = JDate::getInstance($item->dat)->format("d.m.Y H:i");
            $url = JRoute::_("index.php?option=com_empl&amp;task=work.edit&amp;id={$item->id}&amp;return={$return}");
            $arr['edit_link'] = JHtml::link($url, JText::sprintf('COM_EMPL_HEAD_ACTION_EDIT'));
            $url = JRoute::_("index.php?option=com_empl&amp;task=work.forceDelete&amp;workID={$item->id}&amp;return={$return}");
            $arr['delete_link'] = JHtml::link($url, JText::sprintf('COM_EMPL_HEAD_ACTION_DELETE'));
            if ($item->status == '1' || $item->status == '-1') {
                $url = JRoute::_("index.php?option=com_empl&amp;view=schedules&amp;workID={$item->id}");
                $arr['schedule_link'] = JHtml::link($url, JText::sprintf('COM_EMPL_ACTION_GO_TO_SCHEDULE'), array('target' => '_blank'));
            }
            $result[] = $arr;
        }
        return $result;
    }

    private $export, $employerID;

}