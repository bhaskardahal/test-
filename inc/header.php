
<?php
	if($condition == "menu"){
		include_once '../config/config.php';
		include_once '../menu/model.php';
		include_once '../submenu/model.php';
	 }else{
	 	 include_once 'config/config.php';
	 	 include_once 'menu/model.php';
	 	 include_once 'submenu/model.php';
	 }
 	// include_once '../menu/create.php'; 
	 $readObj = new Menu;
	 $getValue = $readObj->showMenu();
	 $submenuObj = new Submenu;
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		test
	</title>
</head>
<body>
<link rel="stylesheet" type="css" href="<?php echo BASE_URL . "assests/css/style.css" ; ?>">
<link rel="stylesheet" type="css" href="<?php echo BASE_URL . "assests/css/bootstrap.css"; ?>">
<div class="header">
<!-- nav.php comes from here -->
	<ul class="nav">
	
		<?php foreach($getValue as $value):?>
			<?php $getValueOfSubmenu = $submenuObj->getSubmenu($value["menu_id"]); ?>
			<pre><<?php var_dump($getValueOfSubmenu); ?></pre>
			<?php $sub_menu = $value['sub_menu'] == 'Y' ? "dropdown" : "";
			?>
 			<li class="<?php echo $sub_menu; ?>">
 				<a href="<?php echo $value['link'];?>" data-toggle="dropdown" aria-expanded="true"><?php echo $value['title'];?></a>
				<?php if($sub_menu == "dropdown"): ?>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					    <li role="presentation">
					    	<?php foreach($getValueOfSubmenu as $valueOfSubmenu): ?>
					    	<a role="menuitem" tabindex="-1" href="#">
					    		<?php echo $valueOfSubmenu['title']; ?>
					    	</a>
					    	<?php endforeach; ?>
					   </li>
 					</ul>
				<?php endif; ?>
			</li>
		<?php endforeach;?>
	</ul>

	<a href ="http://localhost/test/menu/read.php" class="fixed"> menu</a>
	<a href ="http://localhost/test/submenu/read.php" class="submenu"> submenu</a> 

</div>
</body>
</html>
<!-- 
			<div class="dropdown">
  <button  type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    Dropdown
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
  </ul>
</div>
 -->