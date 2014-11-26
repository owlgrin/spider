<?php namespace App\Mailers;

use Illuminate\Support\Facades\Mail;

class Mailer {

	public function sendTo($user, $subject, $view, $data = [])
	{
		Mail::send($view, $data, function($message) use($user, $subject)
		{
			$message->to($user['email'])
			->subject($subject);
		});
	}
}