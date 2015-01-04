<?php
	include_once 'model.php';
	if (isset( $_POST['submit'])):
		$layout_title = $_POST['layout_title'];
		$block_size = $_POST['block_size'];
		$page_title = $_POST['page_title'];
		$position =$_POST['position'];
	$insertData = new Layout();
		$insertData-> create($layout_title, $block_size, $page_title, $position);
		var_dump($insertData);
		header("Location: read.php");
		endif;

?>

<link rel="stylesheet" type="css" href="../assests/css/bootstrap.css"/>
<form action="" method="POST">
<div class="form-group">
<div class="col-md-3">
<label>Layout Title</label>
<input type ="text" class="form-control" name ="layout_title"/>
</div>
</div>
<div class="form-group">
<div class="col-md-3">
<label> Block Size</label>
<input type ="text" class="form-control"name ="block_size"/>
</div>
</div>
<div class="form-group">
<div class="col-md-3">
<label>Page Title</label>
<input type="text" class="form-control" name ="page_title"/>
</div>
</div>
<div class="form-group">
<div class="col-md-3">
<label>Position</label>
<input type="text" class="form-control" name="position"/>
</div>
</div>
<input type="submit" name="submit" value="submit"/>
</form>