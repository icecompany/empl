<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\AdminModel;
use \Joomla\String\StringHelper;

class EmplModelEmployer extends AdminModel {
    public function getTable($name = 'Employers', $prefix = 'TableEmpl', $options = array())
    {
        return JTable::getInstance($name, $prefix, $options);
    }

    public function getItem($pk = null)
    {
        $item = parent::getItem($pk);
        if ($item->id !== null && $item->id !== 0) {
            $fields = array($item->last_name ?? '', $item->first_name ?? '', $item->patronymic ?? '');
            foreach ($fields as $i => $field) if (empty($field)) unset($fields[$i]);
            $item->fio = implode(' ', $fields);
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
            $this->option.'.employer', 'employer', array('control' => 'jform', 'load_data' => $loadData)
        );
        if (empty($form))
        {
            return false;
        }
        return $form;
    }

    protected function loadFormData()
    {
        $data = JFactory::getApplication()->getUserState($this->option.'.edit.employer.data', array());
        if (empty($data))
        {
            $data = $this->getItem();
        }

        return $data;
    }

    public function save($data)
    {
        foreach ($data as $param => $value) if ($value != null) $data[$param] = StringHelper::trim($value);
        $data['birthday'] = JDate::getInstance($data['birthday'])->format("Y-m-d");
        return parent::save($data);
    }

    protected function prepareTable($table)
    {
    	$nulls = array('last_name', 'first_name', 'patronymic', 'birthday'); //Поля, которые NULL

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
            return $user->authorise('core.edit.state', $this->option . '.employer.' . (int) $record->id);
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
        return 'administrator/components/' . $this->option . '/models/forms/employer.js';
    }
}