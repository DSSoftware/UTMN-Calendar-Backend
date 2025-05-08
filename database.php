<?php

class database{
	
	private $db;

	public function __construct($database){
		$bot_db = new mysqli($database['hostname'], $database['login'], $database['password'], $database['dbname'], $database['port']);
		$this->db = $bot_db; 
		$this->db->set_charset("utf8mb4");
	}

    public function saveGoogleCode($code, $state){
		$bot_db = $this->db;
		
		$code = $bot_db->real_escape_string($code);
		$state = $bot_db->real_escape_string($state);

		$req = "INSERT INTO `google_auth` (`code, `user_info`) VALUES ('$code', '$state')" ;

		$bot_db->query($req);
	}
}

?>