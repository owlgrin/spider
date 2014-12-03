<?php

use App\Mailers\Mailer;
use App\Guest\GuestRepo;

class HomeController extends BaseController {

	protected $guestRepo;
	protected $mailer;

	public function __construct(GuestRepo $guestRepo, Mailer $mailer)
	{
		$this->guestRepo = $guestRepo;
		$this->mailer = $mailer;
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

		if(! is_null(Input::get('mail')) && Input::get('mail_me') === 'now')
		{
			$this->mailer->sendTo(Input::all(), Config::get('spider.subject'), 'emails.guest', [ 'body' => str_replace('{name}', Input::get('name'), Input::get('message'))]);
		}
		
		return Redirect::to(Config::get('app.url'). '/');
	}

	public function getGuests()
	{
		$guests = $this->guestRepo->get();

		return View::make('horntell.guest', compact('guests'));
	}
}