<?php 
include_once 'model.php';
$readInstantiate = new Layout;
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
		<td>Layout Title</td>
		<td> Block Size</td>
		<td>Page Title</td>
		<td>Position</td>
		
	</tr>
	<?php $i = 1; ?>
	<?php foreach($getData as $key => $value): ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $value["layout_title"]; ?></td>
		<td><?php echo $value['block_size'];?></td>
		<td><?Php echo $value['page_title'];?></td>
		<td><?php echo $value['position'];?></td>
		
		<td><a href="update.php?id=<?php echo $value["layout_id"] ;?>" >Update</a></td>
		<td><a href="read.php?del_id=<?php echo $value["layout_id"] ;?>" >Delete</a></td>

	</tr>
<?php endforeach; ?>
</table>