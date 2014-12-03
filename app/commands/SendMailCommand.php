<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use App\Mailers\Mailer;

class SendMailCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:mail';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Send mails to user who chose later option.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */

	protected $mailer;

	public function __construct(Mailer $mailer)
	{
		parent::__construct();
		$this->mailer = $mailer;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		try
		{
			$guests = DB::table('guests')
				->where('mail_me', 'later')
				->where('mailed_at', null)
				->get();

			$guestIds = [];

			foreach($guests as $key => $guest) 
			{
				$this->mailer->sendTo($guest, Config::get('spider.subject'), 'emails.guest', [ 'body' => str_replace('{name}', $guest['name'], $guest['message'])]);
				
				$this->info('Mail sent to ' . $guest['name'] . '.');
				array_push($guestIds, $guest['id']);
			}

			DB::table('guests')
			->whereIn('id', $guestIds)
			->update(['mailed_at' => date('Y-m-d H:i:s')]);
			
			$this->info('mailed_at updated for guests.');
			
		}
		catch(PDOException $e)
		{
			$this->error($e->getMessage());
		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('name', InputArgument::REQUIRED, 'Name of user.'),
			// array('email', InputArgument::REQUIRED, 'Email of user.'),
			// array('password', InputArgument::REQUIRED, 'Password of user.'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			// array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}