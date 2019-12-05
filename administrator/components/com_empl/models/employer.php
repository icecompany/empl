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
            $item->hidden_city_id = $item->cityID;
            $item->hidden_city_title = EmplHelper::getCityTitle($item->cityID);
            $item->languages = $this->loadLanguages($item->id);
        }
        return $item;
    }

    public function save($data)
    {
        foreach ($data as $param => $value) if ($value != null && is_string($value)) $data[$param] = StringHelper::trim($value);
        $data['birthday'] = JDate::getInstance($data['birthday'])->format("Y-m-d");
        $s1 = parent::save($data);

        $employerID = ($data['id'] != null) ? $data['id'] : $this->_db->insertid();
        $s2 = $this->saveLanguages($employerID, $data['languages'] ?? array());
        return $s1 && $s2;
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

    private function saveLanguages(int $employerID, array $languages = array()): bool
    {
        $current = $this->loadLanguages($employerID);
        if (empty($current)) {
            if (empty($languages)) return true;
            foreach ($languages as $language) {
                $table = $this->getTable('Languages');
                $arr = array('id' => null, 'employerID' => $employerID, 'languageID' => $language);
                $table->save($arr);
            }
        }
        else {
            foreach ($languages as $language) {
                if (($key = array_search($language, $current)) === false) {
                    $table = $this->getTable('Languages');
                    $arr = array('id' => null, 'employerID' => $employerID, 'languageID' => $language);
                    $table->save($arr);
                }
            }
            foreach ($current as $item) {
                if (($key = array_search($item, $languages)) === false) {
                    $table = $this->getTable('Languages');
                    $table->load(array('employerID' => $employerID, 'languageID' => $item));
                    $table->delete($table->id);
                }
            }
        }
        return true;
    }

    private function loadLanguages(int $employerID): array
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("languageID")
            ->from("#__empl_languages")
            ->where("employerID = {$employerID}");
        return $db->setQuery($query)->loadColumn() ?? array();
    }
}