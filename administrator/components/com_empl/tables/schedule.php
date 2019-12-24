<?php
/**
 * @package    empl
 *
 * @author     Admin <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

use Joomla\CMS\Table\Table;

defined('_JEXEC') or die;

/**
 * Empl table.
 *
 * @package   empl
 * @since     1.0.0
 */
class TableEmplSchedule extends Table
{
    var $id = null;
    var $workID = null;
    var $functionID = null;
    var $placeID = null;
    var $curator = null;
    var $start_time = null;
    var $end_time = null;
    var $comment = null;
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  $db  Database driver object.
	 *
	 * @since   1.0.0
	 */
	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__empl_schedule', 'id', $db);
	}

    public function store($updateNulls = true)
    {
        return parent::store($updateNulls);
    }
}