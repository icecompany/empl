<?php
use Joomla\CMS\Form\FormRule;
defined('_JEXEC') or die;

class JFormRuleBirthday extends FormRule
{
    protected $regex = '^([0-3][0-9]).([0-1][0-9]).([1-2][0-9][0-9][0-9])$';

    public function test(\SimpleXMLElement $element, $value, $group = null, \Joomla\Registry\Registry $input = null, \Joomla\CMS\Form\Form $form = null)
    {
        $config = JComponentHelper::getParams('com_empl');
        $min_age = $config->get('employer_min_age', null);
        $max_age = $config->get('employer_max_age', null);
        $s1 = parent::test($element, $value, $group, $input, $form);
        $dat = JFactory::getDate($value);
        $now = JFactory::getDate();
        $age = $now->diff($dat)->y;
        $s2 = true;
        if ($dat > $now || $dat->format("Y-m-d") == $now->format("Y-m-d")) $s2 = false;
        $s3 = ($min_age !== null && $age < $min_age) ? false : true;
        $s4 = ($max_age !== null && $age > $max_age) ? false : true;
        return $s1 && $s2 && $s3 && $s4;
    }
}