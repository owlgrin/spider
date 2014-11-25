<?php namespace App;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider {
	
	/**
	 * Register the binding
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('App\Guest\GuestRepo', 'App\Guest\DbGuestRepo');
	}
}