<?php

class database{
	
	private $db;

	public function __construct($database){
		$bot_db = new mysqli($database['hostname'], $database['login'], $database['password'], $database['dbname'], $database['port']);
		$this->db = $bot_db; 
		$this->db->set_charset("utf8mb4");
	}

    public function saveGoogleCode($code, $user){
		$bot_db = $this->db;
		
		$code = $bot_db->real_escape_string($code);
		$user = $bot_db->real_escape_string($user);

		$req = "INSERT INTO `google_auth` (`code`, `tg_id`) VALUES ('$code', '$user')" ;

		$bot_db->query($req);
	}
}

?>