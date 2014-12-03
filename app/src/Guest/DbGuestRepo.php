<?php namespace App\Guest;

use Illuminate\Database\DatabaseManager;

use PDOException, Exception;

class DbGuestRepo implements GuestRepo {

	protected $db;


	public function __construct(DatabaseManager $db)
	{
		$this->db = $db;
	}

	public function store($guest)
	{
		try
		{
			$guest = [
				'user_id' => \Auth::id(),
				'name' => array_get($guest, 'name'),
				'email' => array_get($guest, 'email'),
				'phone' => array_get($guest, 'phone'),
				'type' => array_get($guest, 'type'),
				'message' => array_get($guest, 'message'),
				'mail_me' => array_get($guest, 'mail_me'),
				'created_at' => $this->db->raw('now()'),
				'updated_at' => $this->db->raw('now()')
			];

			if(array_get($guest, 'mail_me') === 'now')
			{
				$guest['mailed_at'] = $this->db->raw('now()');
			}

			$this->db->table('guests')->insert($guest);
		}
		catch(PDOException $e)
		{
			dd($e->getMessage());
		}
	}

	public function get()
	{
		return $this->db->table('guests')->get();
	}
}