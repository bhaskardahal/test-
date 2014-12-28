<?php 
$condition = ""; 
include_once 'inc/header.php'; ?>

<?php 
	include_once'model.php';
	if(isset($_POST['submit'])):
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$createStart=new Bhaskar();
	$Create=$createStart->Create($name,$email,$message);
	endif;
 ?> 
<form action="" method="POST">

<div class="row">
<div class="form-group">
<div class="col-md-4">
<label>Name </label>
<input type="text" class="form-control" name="name"/>
</div>
</div>
</div>
<div class="row">
<div class="form-group">
<div class="col-md-4">
<label>Email</label>
<input type="email" class=" form-control" name="email"/>
</div>
</div>
</div>
<div class="row">
<div class="form-group">
<div class="col-md-4">
<label>Message</label>
<textarea name="message" class="form-control" rows="10" cols="30">
</textarea>
</div>
</div>
</div>

<input type="submit" name="submit" value="submit"/>
</from>
<?php include_once'inc/footer.php'; ?>