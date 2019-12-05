<?php
defined('_JEXEC') or die;
$listOrder    = $this->escape($this->state->get('list.ordering'));
$listDirn    = $this->escape($this->state->get('list.direction'));
?>
<tr>
    <th style="width: 1%" class="hidden-phone">
        <?php echo JHtml::_('grid.checkall'); ?>
    </th>
    <th style="width: 1%">
        №
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_EMPLOYERS_LAST_NAME', 'e.last_name', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_EMPLOYER_FIRST_NAME', 'e.first_name', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_EMPLOYER_PATRONYMIC', 'e.patronymic', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_EMPLOYER_GENDER', 'e.gender', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_EMPLOYER_BIRTHDAY', 'e.birthday', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_EMPLOYER_AGE', 'age', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_EMPLOYER_METRO', 'metro', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_EMPLOYER_CITY', 'city', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'ID', 'e.id', $listDirn, $listOrder); ?>
    </th>
</tr>