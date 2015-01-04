<?php 
$condition ="menu";
  include_once '../../inc/header.php';
include_once '../../model/menu.php';
$id = $_GET['id'];
$updateInstantiate = new Menu();
$getValue = $updateInstantiate->getValueById($id);
extract($getValue);
// var_dump($getValue);
// die();
if ( isset ( $_POST['update'])):
			$title = $_POST['title'];
			$link=$_POST['link'];
			$status=$_POST['status'];
			$sub_menu=$_POST['sub_menu'];
			

			$updateInstantiate->update($id,$title,$link,$status,$sub_menu);
			//header("Location:../index.php");
			header("Location: read.php");
		endif;
?>
 <div class="container">
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
		
			<label>Status</label>
			<select type="text" name="status">
			<?php if ($status == 'Y') { ?>
			<option value="Y" selected="selected">Yes</option>
			<option value ="N">No</option>
				
					<?php	} else { ?>
				<option value="Y" >Yes</option>
			<option value ="N" selected="selected">No</option>
			<?php } ?>
			</select>
			</div>
			

		<label>Sub menu</label>
			<select type="text" name="sub_menu">
			<?php echo ($sub_menu == 'Y') ? '<option value="Y" selected="selected">Yes</option>
<option value ="N">No</option>' : '<option value="Y" >Yes</option>
<option value ="N" selected="selected">No</option>' ; ?>
			
			<!-- <?php if ($sub_menu == 'Y') { ?>
			<option value="Y" selected="selected">Yes</option>
			<option value ="N">No</option>
				
					<?php	} else { ?>
				<option value="Y" >Yes</option>
			<option value ="N" selected="selected">No</option>
				
					<?php	}
			 ?>  -->
			</select>
		<input type="submit" name="update" value="update" />
	</form>
	</div> 