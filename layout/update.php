<?php 
include_once 'model.php';
$id = $_GET['id'];
$updateInstantiate = new Layout();
$getValue = $updateInstantiate->getvalueById($id);
extract($getValue);
// var_dump($getValue);
 // die();
if ( isset( $_POST['update'])):
			$layout_title = $_POST['layout_title'];
			$block_size=$_POST['block_size'];
			$page_title=$_POST['page_title'];
			$position=$_POST['position'];
			

			$updateInstantiate->update($id,$layout_title,$block_size,$page_title,$position);
			// var_dump($updateInstantiate);
			header("Location: read.php");
		endif;
?>
 
 <form action="" method="POST">
		<div>
			<label>Layout Title</label>
			<input type="text" name="layout_title" value="<?php echo $layout_title;?>"/>
		</div>
		<div>
			<label>Block Size</label>
			<input type="text" name="block_size" value="<?php echo $block_size;?>"/>
		</div>
		<div>
			<label>Page Title</label>
			<input type="text"name ="page_title" value="<?php echo $page_title;?>"/>
		</div>
		<div>
			<label>Position</label>
			<input type="text" name="position" value="<?php echo $position;?>"/>

		</div>

			<input type="submit" name="update" value="update" />
</form>
	