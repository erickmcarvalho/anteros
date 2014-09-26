<?php
/**
 * Anteros - Laravel Service Provider
 * 
 * @name		Laravel Anteros
 * @author		Érick Carvalho <http://www.github.com/erickmcarvalho>
*/

namespace Anteros;

use Illuminate\Support\ServiceProvider;

class AnterosServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
 	*/
	protected $defer = false;
	
	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	*/
	public function boot()
	{
		//=====================================================
		// Extend Mssql connection driver
		//=====================================================
		
		$factory = $this->app['db'];
		$factory->extend("anteros:mssql", function($config)
		{
			if(!isset($config['prefix']))
			{
				$config['prefix'] = NULL;
			}
			
			$connector = new \Anteros\Database\Connectors\MssqlConnector();
			$pdo = $connector->connect($config);
			
			return new \Anteros\Database\Connections\MssqlConnection($pdo, $config['database'], $config['prefix'], $config);
		});
	}
	
	/**
	 * Register the service provider.
	 * 
	 * @return	void
	*/
	public function register()
	{
		
	}
	
	/**
	 * Get the services provided by the provider.
	 * 
	 * @return	array
	*/
	public function provides()
	{
		return array();
	}
}
