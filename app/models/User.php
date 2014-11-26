<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	
	public static $credentialRules = [
		'name' => 'required',
		'email' => 'sometimes|email',
		'type' => 'required',
		'message' => 'required'
	];

	public static $errors;

	public static function guestValid($data)
	{
		$validation = \Validator::make($data, static::$credentialRules);

		if( $validation->passes())
		{
			return true;
		}

		static::$errors = $validation->messages();
		return false;
	}	

}
