<?php
/**
 * Anteros Database - Connection
 * 
 * @name		Laravel Anteros
 * @author		Érick Carvalho <http://www.github.com/erickmcarvalho>
*/

namespace Anteros\Database;

use Illuminate\Database\Connection as LaravelConnection;

class Connection extends LaravelConnection
{
	/**
	 * Create a new database connection instance.
	 * 
	 * 
	 * @param	\LikePDO	$pdo
	 * @param	string		$database
	 * @param	string		$tablePrefix
	 * @param	array		$config
	 * @return	void
	*/
	public function __construct(LikePDO $pdo, $database = NULL, $tablePrefix = NULL, array $config = array())
	{
		$this->pdo = $pdo;
		
		$this->database = $database;
		$this->tablePrefix = $tablePrefix;
		$this->config = $config;
		
		$this->useDefaultQueryGrammar();
		$this->useDefaultPostProcessor();
	}
}