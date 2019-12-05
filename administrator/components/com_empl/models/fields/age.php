<?php
defined('_JEXEC') or die;
jimport('joomla.form.helper');
JFormHelper::loadFieldClass('list');

class JFormFieldAge extends JFormFieldList
{
    protected $type = 'Age';
    protected $loadExternally = 0;

    protected function getOptions()
    {
        $params = JComponentHelper::getParams('com_empl');
        $min_age = (int) $params->get('employer_min_age', 14);
        $max_age = (int) $params->get('employer_max_age', 99);

        $options = array();

        for ($i = $min_age; $i <= $max_age; $i++) {
            $options[] = JHtml::_('select.option', $i, $i);
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