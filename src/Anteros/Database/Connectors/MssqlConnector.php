<?php
/**
 * Anteros Database - Mssql Connector
 * 
 * @name		Laravel Anteros
 * @author		Érick Carvalho <http://www.github.com/erickmcarvalho>
*/

namespace Anteros\Database\Connectors;

use Illuminate\Database\Connectors\ConnectorInterface;
use Anteros\Database\Connector;
use PDO;

class MssqlConnector extends Connector implements ConnectorInterface
{
	/**
	 * The LikePDO connection options.
	 * 
	 * @var	array
	*/
	protected $options	= array
	(
		PDO::ATTR_CASE => PDO::CASE_NATURAL,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_ORACLE_NULLS => PDO::NULL_NATURAL,
		PDO::ATTR_STRINGIFY_FETCHES => false
	);
	
	/**
	 * Establish a database connection.
	 * 
	 * @param	array	$config
	 * @return	\LikePDO
	*/
	public function connect(array $config)
	{
		$options = $this->getOptions($config);
		
		return $this->createConnection($this->getDsn($config), $config, $options);
	}
	
	/**
	 * Create a DSN string from a configuration.
	 * 
	 * @param	array	$config
	 * @return	string
	*/
	protected function getDsn(array $config)
	{
		extract($config);
		
		$port = isset($config['port']) ? ";port=".$port : NULL;
		$dbname = strlen($database) > 0 ? ";dbname=".$database : NULL;
		
		return "mssql:host={$host}{$port}{$dbname}";
	}
}