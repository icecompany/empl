<?php
use Joomla\CMS\MVC\Model\ListModel;
defined('_JEXEC') or die;

class EmplModelLanguages extends ListModel
{
    public function __construct($config = array())
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'id',
                'employerID',
            );
        }
        if (isset($config['employerID'])) $this->employerID = $config['employerID'];
        if (isset($config['export'])) $this->export = $config['export'];
        if (isset($config['columns'])) $this->columns = $config['columns'];
        if (isset($config['key'])) $this->key = $config['key'];
        if (isset($config['val'])) $this->val = $config['val'];
        parent::__construct($config);
    }

    protected function _getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);
        if (is_array($this->columns) && in_array('title', $this->columns)) {
            $query
                ->leftJoin("#__empl_language_levels el on el.id = l.languageID");
        }
        $this->columns = $db->qn($this->columns);
        if (!empty($this->columns)) {
            $columns = implode(", ", $this->columns);
        }
        else {
            $columns = "l.*";
        }
        $query
            ->select($columns)
            ->from("#__empl_languages l");
        if (is_numeric($this->employerID))
        {
            $this->employerID = $db->q($this->employerID);
            $query->where("l.employerID = {$this->employerID}");
        }
        if (is_array($this->employerID))
        {
            $this->employerID = $db->q($this->employerID);
            $employerID = implode(", ", $this->employerID);
            $query->where("l.employerID in ({$employerID})");
        }
        $this->setState('list.limit', 0);

        return $query;
    }

    public function getItems()
    {
        $items = parent::getItems();
        $result = array();
        if (is_string($this->columns) && !empty($this->columns) == 1 && is_numeric($this->employerID)) {
            $column = $this->columns;
            foreach ($items as $item) {
                $result[] = $item->$column;
            }
        }
        if (is_array($this->columns) && count($this->columns) > 0 && isset($this->key) && isset($this->val)) {
            $key = $this->key;
            $val = $this->val;
            foreach ($items as $item) {
                if (!isset($result[$item->$key])) $result[$item->$key] = array();
                $result[$item->$key][] = $item->$val;
            }
        }
        if (is_array($this->columns) && count($this->columns) > 0 && isset($this->key) && !isset($this->val)) {
            $key = $this->key;
            foreach ($items as $item) {
                $result[$item->$key][] = $item;
            }
        }
        if (is_array($this->columns) && count($this->columns) > 0 && !isset($this->key) && !isset($this->val)) {
            return $items;
        }
        if (is_array($this->columns) && count($this->columns) > 0 && isset($this->key) && isset($this->val) && $this->export) {
            foreach ($result as $item => $value) {
                $result[$item] = implode(", ", $value);
            }
        }
        return $result;
    }

    private $export, $employerID, $columns, $key, $val;

}