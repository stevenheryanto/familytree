<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="refresh" content="0;url=cardCreate.php" />
	<title>Family</title>
</head>
<body> 
<?php
	require_once 'meekrodb.2.2.class.php';	
	$paroki = $_POST['paroki'];
	$kombas = $_POST['kombas'];	
	$kepala = $_POST['kepala'];
	$alamat = $_POST['alamat'];
	$rtrw = $_POST['rtrw'];
	$desa = $_POST['desa'];	
	$kec = $_POST['kec'];	
	$kab = $_POST['kab'];	
	$zip = $_POST['zip'];	
	$hno = $_POST['hno'];	
	$ono = $_POST['ono'];	
	$join = $_POST['join'];	
	$pom = $_POST['pom'];	
	$dom = $_POST['dom'];	
	$kdua = $_POST['kdua'];	
	$beda = $_POST['beda'];	
	$dispen = $_POST['dispen'];	
	$sipil = $_POST['sipil'];	
	$luar = $_POST['luar'];	
	$kua = $_POST['kua'];	

	DB::insert('cards', array(
		'paroki' => $paroki,
		'kombas' => $kombas,
		'kepala' => $kepala,
		'alamat' => $alamat,
		'rtrw' => $rtrw,
		'desa' => $desa,
		'kec' => $kec,
		'kab' => $kab,
		'zip' => $zip,
		'hno' => $hno,
		'ono' => $ono,
		'join' => $join,
		'pom' => $pom,
		'dom' => $dom,
		'kdua' => $kdua,
		'beda' => $beda,
		'dispen' => $dispen,
		'sipil' => $sipil,
		'luar' => $luar,
		'kua' => $kua
		));
	echo "halo";

?>
</body>
</html>