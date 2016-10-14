<?php

namespace  SitewideSnippets;

use Illuminate\Support\ServiceProvider;


class SitewideSnippetsServiceProvider extends ServiceProvider
{
//	protected $defer = false;

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$date = date('Y_m_d_His');

		$this->publishes([
			__DIR__ . '/Admin/sitewideSnippets.php' => app_path('Admin/sitewideSnippets.php'),
			__DIR__ . '/Migrations/create_sitewide_snippets_table.php' => $this->app->databasePath().'/migrations/'. $date .'_create_sitewide_snippets_table.php',
		]);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		require_once(__DIR__ . '/Helpers/helper.php');
	}
}
