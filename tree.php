<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" media="screen" href="style.css" />

	<title>Family Tree</title>
<?php
	require_once 'meekrodb.2.2.class.php';	
		
	$lev = $_POST['level'];
	$na = $_POST['name'];
	if ($lev > 0){
		//echo "halo<br>". $lev ."<br>";
		$result = atas($na,$lev);
	} else {
		$lev = $lev * -1;
		//echo "bawah<br>". $lev ."<br>";
		$result = bawah($na, $lev);
	}
	
	function bawah($bla, $lev){
		if ($lev > 0){
			//echo "masuk bawah: " .$bla."<br>";
			$listrow = DB::query("SELECT * FROM umat WHERE dad=%i or mom=%i", $bla, $bla);
			//var_dump($listrow);
			$lev = $lev - 1;		
			foreach($listrow as $row){
				if($lev == 0) echo $row['name']."<br>";
				bawah($row['id'], $lev);
			}
		}
	}
	function atas($bla, $lev){
		if ($lev > -1){
			//echo "masuk atas: " .$bla."<br>";	
			$row = DB::queryFirstRow("SELECT * FROM umat WHERE id=%i", $bla);
			$lev = $lev - 1;
			if($lev == -1) echo $row['name']."<br>";
			atas($row['dad'], $lev);
			atas($row['mom'], $lev);
		}
	}
?>
</head>
<body> 
<form action="tree.php" method="post">
	<p><label>Relationship: </label> 
	<span><select name="level">
	<option value='7'>Kakait Siwur</option>
	<option value='6'>Udeg-udeg</option>
	<option value='5'>Janggawareng</option>
	<option value='4'>Bao</option>
	<option value='3'>Buyut</option>
	<option value='2'>Kakek Nenek</option>
	<option value='1'>Ayah Ibu</option>
	<option value='0'>Kakak Adik</option>
	<option value='-1'>Anak</option>
	<option value='-2'>Cucu</option>
	<option value='-3'>Cicit</option>
	<option value='-4'>Piut</option>
	<option value='-5'>Anak Piut</option>
	<option value='-6'>Cucu Piut</option>
	<option value='-7'>Cicit Piut</option>
	</select></span></p>
	
	<p><label>Name: </label> 
	<span><select name="name" required><option value='0'></option>
	<?php
		$listname = DB::query("SELECT * FROM umat ORDER BY name ASC");

		foreach ($listname as $lname) {
			echo "<option value='".$lname['id']."'>".$lname['name']."</option>";
		}
	?>
	</select></span></p>
	
	<p><label>&nbsp; </label><span>
	<input class="button" type="submit">
	</span></p>
	
</form>
<?php


//var_dump($result);
echo "<br>";
/*
function tree(array $data, &$tree = array(), $level = 0) {
    // init
    if (!isset($tree[$level])) $tree[$level] = array();

    foreach ($data as $key => $value) {
        // if value is an array, push the key and recurse through the array
        if (is_array($value)) {
            $tree[$level][] = $key;
            tree($value, $tree, $level+1);
        }

        // otherwise, push the value
        else {
            $tree[$level][] = $value;
        }
    }
}

$binary_tree = array(1 => array(2 => array(4,5),4=>array(5,6)));
tree($binary_tree, $output);
var_dump($output);
*/
?>
</body>