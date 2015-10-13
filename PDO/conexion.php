<?php

	/**
	* 
	*/
	class Conexion 
	{
		public $server;
		public $user;
		public $pass;
		public $db_name;

		public function __construct()
		{
			$this->server = 'localhost';
			$this->user = 'root';
			$this->pass = '';
			$this->db_name = 'dodoxsg1_comeatapp';
		}

		public function connect()
		{
			$conn = mysql_connect($this->server, $this->user, $this->pass);
			mysql_select_db($this->db_name, $conn);
		}

		public function closeConect()
		{
			$cerrar =mysql_close();
		}
	}

?>