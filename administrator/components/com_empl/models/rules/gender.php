<?php
use Joomla\CMS\Form\FormRule;
defined('_JEXEC') or die;

class JFormRuleGender extends FormRule
{
    protected $regex = '^([m|f])$';
}