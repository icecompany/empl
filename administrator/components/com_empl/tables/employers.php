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
class TableEmplEmployers extends Table
{
    var $id = null;
    var $guid = null;
    var $last_name = null;
    var $first_name = null;
    var $patronymic = null;
    var $gender = null;
    var $birthday = null;
    var $cityID = null;
    var $metroID = null;
    var $address = null;
    var $weight = null;
    var $height = null;
    var $night = null;
    var $hairID = null;
    var $experience = null;
    var $clothes_size = null;
    var $foot_size = null;
    var $smoke = null;
    var $tattoo = null;
    var $piercing = null;
    var $driver = null;
    var $car = null;
    var $smart = null;
    var $state = null;
	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  $db  Database driver object.
	 *
	 * @since   1.0.0
	 */
	public function __construct(JDatabaseDriver $db)
	{
		parent::__construct('#__empl_employers', 'id', $db);
	}

	public function store($updateNulls = true)
    {
        return parent::store($updateNulls);
    }
}