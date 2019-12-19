<?php
defined('_JEXEC') or die;
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldFunctions extends JFormFieldList
{
    protected $type = 'Functions';
    protected $loadExternally = 0;

    protected function getOptions()
    {
        $db =& JFactory::getDbo();
        $query = $db->getQuery(true);
        $query
            ->select("f.`id`, f.`title`, p.title_ru as project")
            ->from("`#__empl_functions` f")
            ->leftJoin("`#__prj_projects` p on p.id = f.projectID")
            ->order("f.title");
        $result = $db->setQuery($query)->loadObjectList();

        $options = array();

        foreach ($result as $item) {
            $name = sprintf("%s (%s)", $item->title, $item->project);
            $options[] = JHtml::_('select.option', $name);
        }

        if (!$this->loadExternally) {
            $options = array_merge(parent::getOptions(), $options);
        }

        return $options;
    }

    public function getOptionsExternally()
    {
        $this->loadExternally = 1;
        return $this->getOptions();
    }
}