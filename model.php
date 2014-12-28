<?php

Class Bhaskar{

	private $host="localhost";
	private $dbname="test";
	private $username="root";
	private $password="a";
	public $connection="";


	public function __construct(){
		$this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->exec("SET NAMES 'utf8'");
		//var_dump($this->connection);
	}
	public function Create($name, $email, $message){
		$sql = "INSERT INTO cantact(name, email, message) VALUES (:name, :email, :message)";
		$query = $this->connection->prepare($sql);
		$submit=$query->execute(array(':name'=>$name,
									':email'=>$email,
							  ':message'=>$message,
							  ));
	}
}