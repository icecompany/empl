<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\AdminModel;

class EmplModelDocument extends AdminModel {
    public function getTable($name = 'Documents', $prefix = 'TableEmpl', $options = array())
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
            $data = EmplHelper::decryptDocumentData($item->id);
            $item->series = $data['series'];
            $item->num = $data['num'];
            $item->dat = $data['dat'];
            $item->issued = $data['issued'];
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
            $this->option.'.document', 'document', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }
        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.document.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    protected function prepareTable($table)
    {
    	$nulls = array('series', 'num', 'dat', 'issued'); //Поля, которые NULL

	    foreach ($nulls as $field)
	    {
		    if (!strlen($table->$field)) $table->$field = NULL;
    	}

	    if ($table->dat == '0000-00-00 00:00:00') $table->dat = NULL;
	    if ($table->dat != null) $table->dat = JDate::getInstance($table->dat)->format("Y-m-d");
        parent::prepareTable($table);
    }

    protected function canEditState($record)
    {
        $user = JFactory::getUser();

        if (!empty($record->id))
        {
            return $user->authorise('core.edit.state', $this->option . '.document.' . (int) $record->id);
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
        return 'administrator/components/' . $this->option . '/models/forms/document.js';
    }
}