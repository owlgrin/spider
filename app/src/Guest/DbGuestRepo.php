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
			$this->db->table('guests')->insert([
				'user_id' => \Auth::id(),
				'name' => array_get($guest, 'name'),
				'email' => array_get($guest, 'email'),
				'phone' => array_get($guest, 'phone'),
				'type' => array_get($guest, 'type'),
				'message' => array_get($guest, 'message'),
				'created_at' => $this->db->raw('now()'),
				'updated_at' => $this->db->raw('now()')
			]);
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