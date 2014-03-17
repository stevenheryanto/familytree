<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="0;url=umatCreate.php" />
	<title>Family</title>
</head>
<body> 
<?php
	require_once 'meekrodb.2.2.class.php';	
	$name = $_POST['name'];
	$pob = $_POST['pob'];	
	$dob = $_POST['dob'];
	$sex = $_POST['sex'];
	$dad = $_POST['dad'];
	$mom = $_POST['mom'];	
	$p1 = $_POST['p1'];	
	$d1 = $_POST['d1'];	
	$p2 = $_POST['p2'];	
	$d2 = $_POST['d2'];	
	$p3 = $_POST['p3'];	
	$d3 = $_POST['d3'];	
	$p4 = $_POST['p4'];	
	$d4 = $_POST['d4'];	
	$p5 = $_POST['p5'];	
	$d5 = $_POST['d5'];	
	$p6 = $_POST['p6'];	
	$d6 = $_POST['d6'];	
	$p7 = $_POST['p7'];	
	$d7 = $_POST['d7'];	

	DB::insert('umat', array(
		'name' => $name,
		'pob' => $pob,
		'dob' => $dob,
		'sex' => $sex,
		'dad' => $dad,
		'mom' => $mom,
		'p1' => $p1,
		'd1' => $d1,
		'p2' => $p2,
		'd2' => $d2,
		'p3' => $p3,
		'd3' => $d3,
		'p4' => $p4,
		'd4' => $d4,
		'p5' => $p5,
		'd5' => $d5,
		'p6' => $p6,
		'd6' => $d6,
		'p7' => $p7,
		'd7' => $d7
		));

?>
</body>
</html>