<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\AdminModel;
use \Joomla\String\StringHelper;

class EmplModelContact extends AdminModel {
    public function getTable($name = 'Contacts', $prefix = 'TableEmpl', $options = array())
    {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getItem($pk = null)
    {
        $item = parent::getItem($pk);
        if ($item->id == null) {
            $item->employerID = JFactory::getApplication()->getUserStateFromRequest("{$this->option}.employerID", 'employerID', 0);
        }
        else {
            $item->val = EmplHelper::decryptContactData($item->id);
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
            $this->option.'.contact', 'contact', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }
        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.contact.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    protected function prepareTable($table)
    {
    	$nulls = array('description'); //Поля, которые NULL

	    foreach ($nulls as $field)
	    {
		    if (!strlen($table->$field)) $table->$field = NULL;
    	}
        parent::prepareTable($table);
    }

    protected function canEditState($record)
    {
        $user = JFactory::getUser();

        if (!empty($record->id))
        {
            return $user->authorise('core.edit.state', $this->option . '.contact.' . (int) $record->id);
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

    public function getScript()
    {
        return 'administrator/components/' . $this->option . '/models/forms/contact.js';
    }
}