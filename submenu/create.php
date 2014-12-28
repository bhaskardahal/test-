<?php
$condition="menu";
?>
<?php
	include_once '../config/config.php';
 	include_once '../inc/header.php'; 
	include_once 'model.php';
	if(isset ($_POST['submit'])):
		$title =$_POST['title'];
		$link =$_POST['link'];
		$status =$_POST['status'];
		$menu_id =$_POST['menu_id'];

		$insertData= new Submenu();
		

		$insertData->create($title,$link,$status,$menu_id);

		header("Location: read.php");

		endif;

// select menu.menu_id,submenu.menu_id
// INNER JOIN Submenu
// var_dump()
?>
<link rel="stylesheet" type="css" href="../assests/css/bootstrap.css"/>
<form action ="" method="POST">
<div class="form-group">
<div class="col-md-4">
<label>Title</label>
<input type="text" class="form-control" name="title"/>
</div>
</div>
<div class="form-group">
<div class="col-md-4">
<label>Link</label>
<input type="text" class="form-control" name="link"/>
</div>
</div>


<div class="form-group">
<div class="col-md-4">
<label>menu id</label>
<input type="text" class="form-control" name="menu_id">
</div>
</div>
<label>Status</label>
<!-- <input type="text" class="form-control" name="status"/>  -->
<select type="text"  name="status">	
  <!-- <option value="">select</option> -->
  <option value="Y">Yes</option>
 	<option value="N">No</option>
 	</select>
<input type="submit"name="submit"  value="submit"/>
</form>