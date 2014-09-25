<?php
/**
 * Anteros Database - Mssql Connection
 * 
 * @name		Laravel Anteros
 * @author		Érick Carvalho <http://www.github.com/erickmcarvalho>
*/

namespace Anteros\Database\Connections;

use Closure;
use Doctrine\DBAL\Driver\PDOSqlsrv\Driver as DoctrineDriver;
use Illuminate\Database\Query\Processors\SqlServerProcessor;
use Illuminate\Database\Query\Grammars\SqlServerGrammar as QueryGrammar;
use Illuminate\Database\Schema\Grammars\SqlServerGrammar as SchemaGrammar;
use Anteros\Database\Connection;

class MssqlConnection extends Connection
{
	/**
	 * Execute a Closure within a transaction.
	 * 
	 * @param	\Closure  $callback
	 * @return	mixed
	*/
	public function transaction(Closure $callback)
	{
		return $this->transaction();
	}
	
	/**
	 * Get the default query grammar instance.
	 * 
	 * @access	protected
	 * @return	\Illuminate\Database\Query\Grammars\SqlServerGrammar
	*/
	protected function getDefaultQueryGrammar()
	{
		return $this->withTablePrefix(new QueryGrammar);
	}
	
	/**
	 * Get the default schema grammar instance.
	 * 
	 * @access	protected
	 * @return	\Illuminate\Database\Schema\Grammars\SqlServerGrammar
	*/
	protected function getDefaultSchemaGrammar()
	{
		return $this->withTablePrefix(new SchemaGrammar);
	}
	
	/**
	 * Get the default post processor instance.
	 * 
	 * @access	protected
	 * @return	\Illuminate\Database\Query\Processors\Processor
	*/
	protected function getDefaultPortProcessor()
	{
		return new SqlServerProcessor;
	}
	
	/**
	 * Get the Doctrine DBAL Driver.
	 * 
	 * @access	protected
	 * @return	\Doctrine\DBAL\Driver\PDOSqlsrv\Driver
	*/
	protected function getDoctrineDriver()
	{
		return new DoctrineDriver;
	}
}