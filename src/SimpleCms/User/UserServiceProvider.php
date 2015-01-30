<?php namespace SimpleCms\User;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

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
    // Register our package views
    $this->loadViewsFrom(__DIR__.'/../../views', 'user');

    // Register our package translation files
    $this->loadTranslationsFrom(__DIR__.'/../../lang', 'user');

    // Register the files our package should publish
    $this->publishes([
      // Publish our views
      __DIR__.'/../../views' => base_path('resources/views/vendor/user'),
      // Publish our config
      __DIR__.'/../../config/user.php' => config_path('user.php'),
    ]);

    require __DIR__.'/../../routes.php';
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    $this->app->bind('\SimpleCms\User\RepositoryInterface', function($app)
    {
      return new \SimpleCms\User\EloquentRepository(new User);
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [];
  }

}
