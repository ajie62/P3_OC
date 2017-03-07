<?php

class UserManager {

	private $db;

	public function __construct($db) {
		$this->db = $db;
	}

	public function addUser(User $user) {
		$req = $this->db->prepare('INSERT INTO users(username, password, email, date_inscription) VALUES(:username, :password, :email, NOW()');
		$req->bindValue(':username', $user->getUsername());
		$req->bindValue(':password', $user->getPassword());
		$req->bindValue(':email', $user->getEmail());

		$req->execute();

		$result = $req->fetch();
	}
	
}