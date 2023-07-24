<?php

class ConnectData
{
	private $server = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db = 'projectmini';

	private function conn() {
		$connect = mysqli_connect('localhost','root','','projectmini');
		mysqli_set_charset($connect,'utf8');

		return $connect;
	}

	public function select($sql) {
		$connect = $this->conn();
		$result = mysqli_query($connect, $sql);

		mysqli_close($connect);

		return $result;
	}

	public function execute($sql) {
		$connect = $this->conn();
		$result = mysqli_query($connect, $sql);

		mysqli_close($connect);
	}

	
}