<?php
	Class Submenu{
		 private $host ="localhost";
		 private $dbname="test";
		 private $username ="root";
		 private $password ="a";
		 public $connection;




		 public function __construct(){
	 	$this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname ,$this->username ,$this->password);
	 		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->exec("SET NAMES 'utf8'");
		// from 'post'
		// INNER JOIN 'sub_menu'on 'sub_menu.'
			}

	public function create($title,$link,$status,$menu_id){
		$sql ="INSERT INTO sub_menu(title,link,status,menu_id) VALUES (:title,:link,:status,:menu_id)";
	 	$query = $this->connection->prepare($sql);
	 	$query->execute(array(':title'=>$title,
	 							':link'=>$link,
	 							':status'=>$status,
	 							':menu_id'=>$menu_id));
	 	
	 }

	 public function read(){
	 	$sql = "SELECT * FROM sub_menu";
	 	$query = $this->connection->query($sql);
	 	$query->execute();
	 	$data = $query-> fetchAll(PDO::FETCH_ASSOC);
	 	return $data;

	 }
	 public function getValueById($id){
	 	$sql ="SELECT * FROM sub_menu WHERE sub_menu_id=:id";
	 	$query = $this->connection->prepare($sql);
	 	$query->execute(array(':id'=>$id));
	 	$data =$query->fetch(PDO::FETCH_ASSOC);
	 	return $data;

	 }
	 public function update($id,$title,$link,$status ,$menu_id){
		$sql = "UPDATE sub_menu SET title=:title,link=:link,status=:status,menu_id=:menu_id WHERE sub_menu_id=:id" ;
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id,
							   ':title'=>$title,
							   ':link'=>$link,
							   ':status'=>$status,
							   ':menu_id'=>$menu_id)); 
	}
	public function getSubmenu($menu_id){
	 	$sql = "SELECT * FROM sub_menu WHERE menu_id = :menu_id AND status='Y'";
	 	$query = $this->connection->prepare($sql);
	 	$query->execute(array(':menu_id'=>$menu_id));
	 	$data = $query->fetchAll(PDO::FETCH_ASSOC);
	 	return $data;
	 }
	public function delete($id){
		$sql = "DELETE FROM sub_menu WHERE sub_menu_id=:id";
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id));
		return true;
	}


		 }
	