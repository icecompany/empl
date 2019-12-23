<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\AdminModel;

class EmplModelWork extends AdminModel {
    public function getTable($name = 'Work', $prefix = 'TableEmpl', $options = array())
    {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getItem($pk = null)
    {
        $item = parent::getItem($pk);
        if ($item->id == null) {
            $item->employerID = $this->getState('employerID');
        }
        else {
            $view = JFactory::getApplication()->input->getString('view', 'work');
            if ($view == 'work' && $item->dat != null) {
                $dat = JDate::getInstance($item->dat, '+3');
                $item->dat = $dat;
            }
        }
        $item->title = $this->getEmployerTitle($item->employerID);
        return $item;
    }

    public function getEmployerTitle(int $employerID): string
    {
        $model = parent::getInstance('Employer', 'EmplModel');
        $employer = $model->getItem($employerID);
        return $employer->fio;
    }

    public function delete(&$pks)
    {
        return parent::delete($pks);
    }

    public function getForm($data = array(), $loadData = true)
    {
        $form = $this->loadForm(
            $this->option.'.work', 'work', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }
        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.work.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    protected function prepareTable($table)
    {
    	$nulls = array('dat', 'comment'); //Поля, которые NULL

	    foreach ($nulls as $field)
	    {
		    if (!strlen($table->$field)) $table->$field = NULL;
    	}
        if ($table->dat == '0000-00-00 00:00:00') $table->dat = NULL;
        if ($table->dat != null) $table->dat = JDate::getInstance($table->dat)->toSql();
        parent::prepareTable($table);
    }

    protected function canEditState($record)
    {
        $user = JFactory::getUser();

        if (!empty($record->id))
        {
            return $user->authorise('core.edit.state', $this->option . '.work.' . (int) $record->id);
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
        $employerID = JFactory::getApplication()->getUserStateFromRequest("{$this->option}.employerID", 'employerID', 0);
        $this->setState('employerID', $employerID);
        parent::populateState();
    }

    public function getScript()
    {
        return 'administrator/components/' . $this->option . '/models/forms/work.js';
    }
}