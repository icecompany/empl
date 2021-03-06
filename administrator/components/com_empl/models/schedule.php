<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\AdminModel;

class EmplModelSchedule extends AdminModel {
    public function getTable($name = 'Schedule', $prefix = 'TableEmpl', $options = array())
    {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getItem($pk = null)
    {
        $item = parent::getItem($pk);
        if ($item->id == null) {
            $item->workID = $this->getState('workID');
        }
        return $item;
    }

    public function delete(&$pks)
    {
        return parent::delete($pks);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm(
            $this->option.'.schedule', 'schedule', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }
        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.schedule.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    protected function prepareTable($table)
    {
    	$nulls = array('comment'); //Поля, которые NULL

	    foreach ($nulls as $field)
	    {
		    if (!strlen($table->$field)) $table->$field = NULL;
    	}
        $table->start_time = JDate::getInstance($table->start_time)->toSql();
        $table->end_time = JDate::getInstance($table->end_time)->toSql();
        parent::prepareTable($table);
    }

    public function getTitle(): string
    {
        $item = $this->getItem();
        $workID = ($item->id === false) ? $this->getState("workID", 0) : $item->workID;
        if ($workID > 0) {
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

    protected function canEditState($record)
    {
        $user = JFactory::getUser();

        if (!empty($record->id))
        {
            return $user->authorise('core.edit.state', $this->option . '.schedule.' . (int) $record->id);
        }
        else
        {
            return parent::canEditState($record);
        }
    }

    public function publish(&$pks, $value = 1)
    {
        return parent::publish($pks, $value);
    }

    protected function populateState()
    {
        $workID = JFactory::getApplication()->getUserStateFromRequest("{$this->option}.workID", 'workID', 0);
        $this->setState('workID', $workID);
        parent::populateState();
    }

    public function getScript()
    {
        return 'administrator/components/' . $this->option . '/models/forms/schedule.js';
    }
}