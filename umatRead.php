<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="http://ds.dibiakcom.net/jquery/jquery-latest.js"></script>
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/reset.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="http://ds.dibiakcom.net/font-awesome.css" />
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Family</title>
<?php
	require_once 'meekrodb.2.2.class.php';	
	$search = $_POST['search'];
	if($search != NULL){
		$listrow = DB::query("SELECT * FROM umat WHERE name LIKE %ss", $search);
		}
?>
</head>
<body>
<form class="fform" action="umatRead.php" method="post">
		<p><label>Nama: </label> 
		<span><input type="text" name="search" pattern="[A-Za-z ]*">
		</span></p>
		<p><label>&nbsp; </label>
		<span><input type="submit" class="button">
		</span></p>
</form>
<?php	
	echo "<ul id='fl_table'>";	
	foreach($listrow as $row ){
			echo "<li id=".$row['id']." ondragstart=drag(event)><a href='umatCreate.php?id=".$row['id']."'>". $row['name'] ."</a></li>";
	}
	echo "</ul>";
?>
</body>
</html>