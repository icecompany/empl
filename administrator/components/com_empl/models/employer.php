<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\AdminModel;
use Joomla\CMS\MVC\Model\ListModel;
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
            $item->address = EmplHelper::decryptEmployerAddress($item->id);
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
        if ($data['id'] !== null) {
            $this->uploadFiles($data['id']);
        }
        return $s1 && $s2;
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
    	$nulls = array('last_name', 'first_name', 'patronymic', 'birthday', 'tattoo', 'piercing', 'metroID', 'night', 'address'); //Поля, которые NULL

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

    public function getWorks(): array
    {
        $item = parent::getItem();
        if ($item->id == null) return array();
        $model = ListModel::getInstance('Works', 'EmplModel', array('employerID' => $item->id));
        return $model->getItems();
    }

    public function getContacts(): array
    {
        $item = parent::getItem();
        if ($item->id == null) return array();
        $model = ListModel::getInstance('Contacts', 'EmplModel', array('employerID' => $item->id));
        return $model->getItems();
    }

    public function getDocuments(): array
    {
        $item = parent::getItem();
        if ($item->id == null) return array();
        $model = ListModel::getInstance('Documents', 'EmplModel', array('employerID' => $item->id));
        return $model->getItems();
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
            foreach ($languages as $language) if (($key = array_search($language, $current)) === false) $this->addLanguage($employerID, $language);
            foreach ($current as $item) if (($key = array_search($item, $languages)) === false) $this->deleteLanguage($employerID, $item);
        }
        return true;
    }

    private function loadLanguages(int $employerID): array
    {
        $params = array('employerID' => $employerID, 'columns' => 'languageID');
        $model = ListModel::getInstance('Languages', 'EmplModel', $params);
        return $model->getItems() ?? array();
    }

    private function addLanguage(int $employerID, int $languageID): void
    {
        $table = $this->getTable('Languages');
        $arr = array('id' => null, 'employerID' => $employerID, 'languageID' => $languageID);
        $table->save($arr);
    }

    private function deleteLanguage(int $employerID, int $languageID): void
    {
        $table = $this->getTable('Languages');
        $table->load(array('employerID' => $employerID, 'languageID' => $languageID));
        $table->delete($table->id);
    }

    private function uploadFiles(int $employerID): void {
        $files = $_FILES['jform'];
        if (!empty($files['name'])) {
            JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . "/components/com_yastorage/models", 'YastorageModel');
            $model = JModelLegacy::getInstance('Mkv', 'YastorageModel');
            $key = "employers/{$employerID}";
            $paths = [];
            foreach ($files['name'] as $file) {
                foreach ($file as $index => $name) {
                    $paths[] = $model->upload($bucket = 'mkv-empl', $key, $files['tmp_name']['file'][$index], $name);
                }
            }
        }
    }

    public function getFiles(): array
    {
        $item = parent::getItem();
        if ($item->id === null) return [];
        JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . "/components/com_yastorage/models", 'YastorageModel');
        $model = JModelLegacy::getInstance('Mkv', 'YastorageModel');
        $bucket = 'mkv-empl';
        $prefix = "employers/{$item->id}/";
        $files = $model->listObjects($bucket, $prefix);
        if (empty($files)) return [];
        $result = [];
        foreach ($files as $file) {
            $arr = [];
            $url = JRoute::_("index.php?option=com_yastorage&amp;task=mkv.download&amp;bucket={$bucket}&amp;key={$file['Key']}");
            $image_url = $model->getLink('mkv-empl', $file['Key']);
            $arr['download_link'] = JHtml::link($url, basename($file['Key']));
            $url = JRoute::_("index.php?option=com_yastorage&amp;task=mkv.delete&amp;bucket={$bucket}&amp;key={$file['Key']}");
            $arr['delete_link'] = JHtml::link($url, JText::sprintf('COM_MKV_ACTION_DELETE'));
            $arr['size'] = JText::sprintf('COM_YASTORAGE_HEAD_OBJECT_SIZE_TEXT_MB', round((float) $file['Size'] / 1024 / 1024, 2));
            $arr['modified'] = JDate::getInstance($file['LastModified']->date)->format("d.m.Y");
            $arr['image'] = JHtml::link($image_url, JHtml::image($image_url, '', ['width' => '320px']), ['target' => '_blank']);
            $result[] = $arr;
        }
        return $result;
    }
}