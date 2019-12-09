<?php
use Joomla\CMS\Form\FormRule;
defined('_JEXEC') or die;

class JFormRuleContacttype extends FormRule
{
    protected $regex = '^(mobile|email|vk)$';
}