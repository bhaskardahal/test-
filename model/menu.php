<?php


Class Menu{
	 private $host = "localhost";
	 private $dbname= "test";
	 private $username = "root";
	 private $password = "a";
	 public $connection;




	 public function __construct(){
	 	$this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname ,$this->username ,$this->password);
	 		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->exec("SET NAMES 'utf8'");
	 }


	 public function create($title,$link,$status,$sub_menu){
	 	$sql ="INSERT INTO menu(title,link,status,sub_menu) VALUES (:title,:link,:status,:sub_menu)";
	 	$query = $this->connection->prepare($sql);
	 	$query->execute(array(':title'=>$title,
	 							':link'=>$link,
	 							':status'=>$status,
	 							':sub_menu'=>$sub_menu));
	 }
	 public function read(){
	 	$sql = "SELECT * FROM menu";
	 	$query = $this->connection->query($sql);
	 	$query->execute();
	 	$data = $query-> fetchAll(PDO::FETCH_ASSOC);
	 	return $data;
	 }
	 public function showMenu(){
	 	$sql = "SELECT * FROM menu WHERE status='Y'";
	 	$query = $this->connection->query($sql);
	 	$query->execute();
	 	$data = $query-> fetchAll(PDO::FETCH_ASSOC);
	 	return $data;
	 }
	 public function getvalueById($id){
	 	$sql ="SELECT * FROM menu WHERE menu_id=:id";
	 	$query = $this->connection->prepare($sql);
	 	$query->execute(array(':id'=>$id));
	 	$data =$query->fetch(PDO::FETCH_ASSOC);
	 	return $data;

	 }
	 public function update($id,$title,$link,$status,$sub_menu){
		$sql = "UPDATE menu SET title=:title,link=:link,status=:status,sub_menu=:sub_menu WHERE menu_id=:id" ;
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id,
							   ':title'=>$title,
							   ':link'=>$link,
							   ':status'=>$status,
							   ':sub_menu'=>$sub_menu)); 
	}
	public function delete($id){
		$sql = "DELETE FROM menu WHERE menu_id=:id";
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id));
		return true;
	}


}