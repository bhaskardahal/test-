
<?php 
include_once '../../model/menu.php';
$readInstantiate = new Menu;
$getData = $readInstantiate->read();
//var_dump($getData);
if(isset($_REQUEST['del_id'])){
	$readInstantiate->delete($_REQUEST['del_id']);
	header("location : read.php");
}
?>
<table>
	<tr>
		<td>S.No.</td>
		<td>Title</td>
		<td>Link</td>
		<td>Status</td>
		<td>Sub Menu</td>
		
	</tr>
	<?php $i = 1; ?>
	<?php foreach($getData as $key => $value): ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $value["title"]; ?></td>
		<td><?php echo $value['link'];?></td>
		<td><?Php echo $value['status'];?></td>
		<td><?php echo $value['sub_menu'];?></td>
		
		<td><a href="update.php?id=<?php echo $value["menu_id"] ;?>" >Update</a></td>
		<td><a href="read.php?del_id=<?php echo $value["menu_id"] ;?>" >Delete</a></td>

	</tr>
<?php endforeach; ?>
</table>