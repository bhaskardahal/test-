 <?php //include_once '../inc/header.php';
  $condition="menu";
  
// ?>
   
 <?php
	 include_once '../config/config.php';
 	include_once '../inc/header.php'; 
	include_once 'model.php';
	if (isset ( $_POST['submit'])):
		$title = $_POST['title'];
		$link=$_POST['link'];
		$status=$_POST['status'];
		$sub_menu=$_POST['sub_menu'];
		//echo $sab_menu; die();
	$insertData = new Menu();
			$insertData->create($title, $link, $status, $sub_menu);
	header("Location: read.php");
	endif;
        		

?>
<?php include_once '../inc/header.php'; ?>
<link rel="stylesheet" type="css" href="../assests/css/bootstrap.css"/>

<div class="container">
	<div class="col-md-12"  style="background-color: #fff;">
	<form action="" method="POST">
		<div class="">
			
				<label>Enter Title Of Menu</label>
			<div class="col-md-3">
				<input type="text" class="form-control" name="title"/>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="form-control">
			<div class="col-md-3">
				<label>Enter Link</label>
				<input type="text" class="form-control" name="link"/>
			</div>
		</div>
		<div class="form-control">
			<div class="col-md-3">
			
				<label>Status</label>
			<select type="text" name="status">	
  <option value="Y">Yes</option>
 	<option value="N">No</option>
 	</select>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="form-control">
			<div class="col-md-3">
			
				<label>Sub menu</label>
			<select type="text" name="sub_menu">	
  <option value="Y">Yes</option>
 	<option value="N">No</option>
 	</select>
			</div>
		</div>

		
		
	<input type="submit"name="submit" value="submit"/>
	</form>
	</div>
</div>
<style>
body{
	width: 100%;
}
</style>