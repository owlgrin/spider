<?php namespace App\Guest;

use Illuminate\Database\DatabaseManager;

use PDOException, Exception;

class DbGuestRepo implements GuestRepo {

	protected $db;


	public function __construct(DatabaseManager $db)
	{
		$this->db = $db;
	}

	public function store($user)
	{
		try
		{
			$userId = $this->db->table('guests')->insertGetId([
				'name' => array_get($user, 'name'),
				'email' => array_get($user, 'email'),
				'phone' => array_get($user, 'phone'),
				'type' => array_get($user, 'type'),
				'message' => array_get($user, 'message'),
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