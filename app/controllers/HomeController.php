<?php

use App\Guest\GuestRepo;

class HomeController extends BaseController {

	public function __construct(GuestRepo $guestRepo)
	{
		$this->guestRepo = $guestRepo;
	}	


	public function showWelcome()
	{
		return View::make('horntell.register');
	}

	public function storeGuests()
	{
		if( ! User::guestValid(Input::all()))
		{
			return Redirect::back()->withInput()->withErrors(User::$errors);
		}

		$this->guestRepo->store(Input::all());

		return Redirect::to(Config::get('app.url'). '/');
	}

	public function getGuests()
	{
		$guests = $this->guestRepo->get();

		return View::make('horntell.guest', compact('guests'));
	}
}