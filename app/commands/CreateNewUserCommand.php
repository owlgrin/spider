<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CreateNewUserCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:create';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Creates a new user.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
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
			DB::table('users')->insert(array(
				'name' => $this->argument('name'),
				'email' => $this->argument('email'),
				'password' => Hash::make($this->argument('password')),
				'created_at' => DB::raw('now()'),
				'updated_at' => DB::raw('now()')
			));
			
			$this->info('User created successfully.');
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
			array('name', InputArgument::REQUIRED, 'Name of user.'),
			array('email', InputArgument::REQUIRED, 'Email of user.'),
			array('password', InputArgument::REQUIRED, 'Password of user.'),
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
