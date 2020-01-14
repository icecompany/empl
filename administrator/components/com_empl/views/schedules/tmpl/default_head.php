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
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_SCHEDULES_FIO', 'e.last_name', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_SCHEDULES_PROJECT', 'p.title_ru', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_SCHEDULES_FUNCTION', 'f.title', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_SCHEDULES_PLACE', 'pl.title', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_SCHEDULES_START_TIME', 's.start_time', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_SCHEDULES_END_TIME', 's.start_time', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'COM_EMPL_HEAD_SCHEDULES_CURATOR', 's.curator', $listDirn, $listOrder); ?>
    </th>
    <th>
        <?php echo JText::sprintf('COM_EMPL_HEAD_SCHEDULES_COMMENT'); ?>
    </th>
    <th>
        <?php echo JHtml::_('searchtools.sort', 'ID', 's.id', $listDirn, $listOrder); ?>
    </th>
</tr>