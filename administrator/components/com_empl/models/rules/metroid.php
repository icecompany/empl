<?php
use Joomla\CMS\Form\FormRule;
defined('_JEXEC') or die;

class JFormRuleMetroid extends FormRule
{
    protected $regex = '^([0-9]{1,3})$';

    public function test(\SimpleXMLElement $element, $value, $group = null, \Joomla\Registry\Registry $input = null, \Joomla\CMS\Form\Form $form = null)
    {
        $s1 = parent::test($element, $value, $group, $input, $form);
        $s2 = (!empty($value)) ? true : false;
        return $s1 && $s2;
    }
}