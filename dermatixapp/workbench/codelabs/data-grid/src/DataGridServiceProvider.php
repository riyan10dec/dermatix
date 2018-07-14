<?php namespace Codelabs\DataGrid;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class DataGridServiceProvider extends ServiceProvider {

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
		$this->package('codelabs/data-grid', 'data-grid', __DIR__);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['data-grid'] = $this->app->share(function(){
			return new DataGrid();
		});
		$this->app->booting(function(){
			$loader = AliasLoader::getInstance();
			$loader->alias('DataGrid2', 'Codelabs\DataGrid\Facades\DataGrid');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
