<?php
/**
 * Anteros Database - Driver Connector
 * Use the LikePDO
 * 
 * @name		Laravel Anteros
 * @author		Érick Carvalho <http://www.github.com/erickmcarvalho>
*/

namespace Anteros\Database;

use Illuminate\Database\Connectors\Connector as LaravelConnector;
use LikePDO\LikePDO;

class Connector extends LaravelConnector
{
	/**
	 * Create a new LikePDO connection.
	 * 
	 * @param	string	$dsn
	 * @param	array	$config
	 * @param	array	$options
	 * @return	\LikePDO
	*/
	public function createConnection($dsn, array $config, array $options)
	{
		$username = array_get($config, "username");
		$password = array_get($config, "password");
		
		return new LikePDO($dsn, $username, $password, $options);
	}
}