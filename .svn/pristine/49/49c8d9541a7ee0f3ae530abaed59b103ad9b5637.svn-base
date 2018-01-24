<?php namespace Google\Drive;

use Illuminate\Support\ServiceProvider;

class DriveServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;


	public function boot()
    {
        $this->package('google/drive');
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['drive'] = $this->app->share(function($app)
        {
            return new Drive;
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
