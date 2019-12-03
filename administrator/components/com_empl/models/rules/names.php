<?php
use Joomla\CMS\Form\FormRule;
defined('_JEXEC') or die;

class JFormRuleNames extends FormRule
{
    protected $regex = '^([А-Яа-яA-Za-z-]{1,})$';
}