<?php


Class Layout{
	private $host = "localhost";
	private $dbname = "test";
	private $username = "root";
	private $password = "a";
	private $connection;



	public function __construct(){
	 	$this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname ,$this->username ,$this->password);
	 		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->connection->exec("SET NAMES 'utf8'");

	}



	public function create($layout_title,$block_size,$page_title,$position){
		$sql ="INSERT INTO layout ( layout_title,block_size,page_title,position) VALUES (:layout_title,:block_size,:page_title,:position)";
		$qurey = $this->connection->prepare($sql);
		$qurey->execute(array(':layout_title'=>$layout_title,
								':block_size'=>$block_size,
								':page_title'=>$page_title,
								':position'=>$position));

	}


	public function read(){
	 	$sql = "SELECT * FROM layout";
	 	$query = $this->connection->query($sql);
	 	$query->execute();
	 	$data = $query-> fetchAll(PDO::FETCH_ASSOC);
	 	return $data;
	 }
	 public function getvalueById($id){
	 	$sql ="SELECT * FROM layout WHERE layout_id=:id";
	 	$query = $this->connection->prepare($sql);
	 	$query->execute(array(':id'=>$id));
	 	$data =$query->fetch(PDO::FETCH_ASSOC);
	 	return $data;
		 	}
	public function update($id,$layout_title,$block_size,$page_title,$position){
		$sql = "UPDATE layout SET layout_title=:layout_title,block_size=:block_size,page_title=:page_title,position=:position WHERE layout_id=:id" ;
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id,
							   ':layout_title'=>$layout_title,
							   ':block_size'=>$block_size,
							   ':page_title'=>$page_title,
							   ':position'=>$position)); 
	}
	public function delete($id){
		$sql = "DELETE FROM layout WHERE layout_id=:id";
		$query = $this->connection->prepare($sql);
		$query->execute(array(':id'=>$id));
		return true;
	}	 	
}