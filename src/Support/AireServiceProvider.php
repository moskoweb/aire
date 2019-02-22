<?php

namespace Galahad\Aire\Support;

use Galahad\Aire\Aire;
use Galahad\Aire\Elements\Form;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AireServiceProvider extends ServiceProvider
{
	/**
	 * Resolved path to internal config file
	 *
	 * @var string
	 */
	protected $config_path;
	
	/**
	 * Resolved path to internal views
	 *
	 * @var string
	 */
	protected $view_directory;
	
	/**
	 * Resolved path to internal translations
	 *
	 * @var string
	 */
	protected $translations_directory;
	
	/**
	 * Resolved path to the built JS directory
	 *
	 * @var string
	 */
	protected $js_dist_directory;
	
	public function __construct(Application $app)
	{
		parent::__construct($app);
		
		$base_path = dirname(__DIR__, 2);
		
		$this->config_path = "$base_path/config/aire.php";
		$this->view_directory = "$base_path/views";
		$this->translations_directory = "$base_path/translations";
		$this->js_dist_directory = "$base_path/js/dist";
	}
	
	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		require_once __DIR__.'/helpers.php';
		
		$this->bootConfig();
		$this->bootViews();
		$this->bootTranslations();
		$this->bootPublicAssets();
	}
	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom($this->config_path, 'aire');
		
		$this->app->singleton('galahad.aire', function(Application $app) {
			return new Aire(
				$app['view'],
				$app['session.store'],
				$app['galahad.aire.form.resolver'],
				$app['config']['aire']
			);
		});
		
		$this->app->alias('galahad.aire', Aire::class);
		
		$this->app->bind('galahad.aire.form', function(Application $app) {
			return new Form(
				$app['galahad.aire'],
				$app['url'],
				$this->js_dist_directory,
				$app->bound('router') ? $app['router'] : null,
				$app->bound('session.store') ? $app['session.store'] : null
			);
		});
		
		$this->app->alias('galahad.aire.form', Form::class);
		
		$this->app->singleton('galahad.aire.form.resolver', function(Application $app) {
			return function() use ($app) {
				return $app->make(Form::class);
			};
		});
	}
	
	/**
	 * Boot our views
	 *
	 * @return $this
	 */
	protected function bootViews() : self
	{
		$this->loadViewsFrom($this->view_directory, 'aire');
		
		if (method_exists($this->app, 'resourcePath')) {
			$this->publishes([
				$this->view_directory => $this->app->resourcePath('views/vendor/aire'),
			], 'aire-views');
		}
		
		return $this;
	}
	
	/**
	 * Boot the configuration
	 *
	 * @return \Galahad\Aire\Support\AireServiceProvider
	 */
	protected function bootConfig() : self
	{
		// TODO: It may make sense to not publish the default classes/etc so that
		// TODO: publishing doesn't fix the user to that set of default classes
		
		if (method_exists($this->app, 'configPath')) {
			$this->publishes([
				$this->config_path => $this->app->configPath('aire.php'),
			], 'aire-config');
		}
		
		return $this;
	}
	
	/**
	 * Boot the translations
	 *
	 * @return \Galahad\Aire\Support\AireServiceProvider
	 */
	protected function bootTranslations() : self
	{
		$this->loadTranslationsFrom($this->translations_directory, 'aire');
		
		if (method_exists($this->app, 'resourcePath')) {
			$this->publishes([
				$this->translations_directory => $this->app->resourcePath('lang/vendor/aire'),
			], 'aire-translations');
		}
		
		return $this;
	}
	
	/**
	 * Publish public assets (JS/etc)
	 *
	 * @return \Galahad\Aire\Support\AireServiceProvider
	 */
	protected function bootPublicAssets() : self
	{
		if (method_exists($this->app, 'publicPath')) {
			$this->publishes([
				$this->js_dist_directory => $this->app->publicPath().'/vendor/aire/js',
			], 'aire-public-assets');
		}
		
		return $this;
	}
	
	/**
	 * @inheritdoc
	 */
	protected function mergeConfigFrom($path, $key)
	{
		$default_config = require $path;
		$user_config = $this->app['config']->get($key, []);
		
		$merged_config = array_merge($default_config, $user_config);
		
		$recursive_configs = ['default_attributes', 'default_classes', 'validation_classes'];
		
		foreach ($recursive_configs as $config_key) {
			if (!isset($user_config[$config_key])) {
				continue;
			}
			
			foreach ($default_config[$config_key] as $subkey => $defaults) {
				if (is_string($defaults) && !isset($user_config[$config_key][$subkey])) {
					$merged_config[$config_key][$subkey] = $defaults;
				} else if (is_array($defaults)) {
					$merged_config[$config_key][$subkey] = array_merge(
						$defaults,
						$user_config[$config_key][$subkey] ?? []
					);
				}
			}
		}
		
		$this->app['config']->set($key, $merged_config);
	}
}
