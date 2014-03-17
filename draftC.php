<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="0;url=draftCreate.php" />
	<title>Family</title>
</head>
<body> 
<?php
	require_once 'meekrodb.2.2.class.php';	
	$person1 = $_POST['person1'];
	$person2 = $_POST['person2'];
	$person3 = $_POST['person3'];
	$person4 = $_POST['person4'];
	$person5 = $_POST['person5'];
	$person6 = $_POST['person6'];
	DB::insert('umat', array('name' => $person1));
	$idayah = DB::queryFirstRow("SELECT * FROM umat WHERE name=%s", $person1);
	if($person2 != NULL){
		DB::insert('umat', array('name' => $person2, 'head' => $idayah));
	}
	if($person3 != NULL){
		DB::insert('umat', array('name' => $person3, 'head' => $idayah, 'dad' => $idayah));
	}
	if($person4 != NULL){
		DB::insert('umat', array('name' => $person4, 'head' => $idayah, 'dad' => $idayah));
	}
	if($person5 != NULL){
		DB::insert('umat', array('name' => $person5, 'head' => $idayah, 'dad' => $idayah));
	}
	if($person6 != NULL){
		DB::insert('umat', array('name' => $person6, 'head' => $idayah, 'dad' => $idayah));	
	}
?>
</body>
</html>