<?php
 $condition ="menu";

// include_once '../inc/header.php';
include_once 'model.php';
include_once '../menu/model.php';
$menuObj= new menu();
$listOfMenu = $menuObj->read('read');
$id = $_GET['id'];
$updateInstantiate = new Submenu();
$getValue = $updateInstantiate->getValueById($id);
extract($getValue);
//var_dump($getValue);
if ( isset ( $_POST['update'])):
			$title = $_POST['title'];
			$link=$_POST['link'];
			$status=$_POST['status'];
			$menu_id=$_POST['menu_id'];

			$updateInstantiate->update($id,$title,$link,$status,$menu_id);
			
			header("Location: read.php");
		endif;
?>

<form action="" method="POST">
		<div>
			<label>Enter Title Of Menu</label>
			<input type="text" name="title" value="<?php echo $title; ?>" />
		</div>
		<div>
			<label>link</label>
			<input type="text" name="link" value="<?php echo $link ;?>"/>
		</div>
		<div>
		<label>menu id</label>
		<select name="menu_id">
			<?php foreach($listOfMenu as $menu): ?>
			<option value = "<?php  echo $menu['menu_id'];?>">
				<?php echo $menu['title']; ?>
			</option> 
			<?php endforeach; ?>
		</select>
		</div>
		<div>
			<label>Status</label>
			<select type="text" name="status">
			<?php if ($status == 'Y') { ?>
			<option value="Y" selected="selected">Yes</option>
			<option value ="N">No</option>
				
					<?php	} else { ?>
				<option value="Y" >Yes</option>
			<option value ="N" selected="selected">No</option>
				
					<?php	}
			 ?>
			<!-- <?php $Yesselect=($status == "yes") ? "selected"  : "";?> 
			<?php $Noselect=($status == "no") ? "selected" : ""; ?>
			<select type="text" name="status">
			<option <?php echo $Yesselect; ?> value="Y">Yes</option>
			<option <?php echo $Noselect ; ?> value ="N">No</option>
			</select> -->
	
		<!-- <select>	
  <option value="">select</option>
  <option value="Y">Yes</option>
 	<option value="N">No</option>
 	</select> -->
			</div>
			<input type="submit" name="update" value="update" />
	</form>
	