<?php namespace App\Guest;

interface GuestRepo {
	
	public function store($guest);
	public function get();
}