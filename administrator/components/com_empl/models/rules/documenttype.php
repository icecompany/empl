<?php
use Joomla\CMS\Form\FormRule;
use Joomla\Registry\Registry;
use Joomla\CMS\Form\Form;

defined('_JEXEC') or die;

class JFormRuleDocumenttype extends FormRule
{
    protected $regex = '^(passport)$';

    public function test(\SimpleXMLElement $element, $value, $group = null, Registry $input = null, Form $form = null)
    {
        if (empty($value)) return false;
        return parent::test($element, $value, $group, $input, $form);
    }
}