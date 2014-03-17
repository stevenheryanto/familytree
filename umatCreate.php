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
		$id = $_GET['id'];
		$row = DB::queryFirstRow("SELECT * FROM umat WHERE id=%i", $id);
	?>
</head>
<body>
	<form class="fform" action="umatC.php" method="post">
		<p><label>Nama Lengkap: </label> 
		<span><input type="text" name="name" value="<?= $row['name'] ?>" pattern="[A-Za-z ]*">
		</span></p>
		
		<p><label>Tempat Lahir: </label>
		<span><input type="text" name="pob" value="<?= $row['pob'] ?>">
		</span></p>
		
		<p><label>Tanggal Lahir: </label>
		<span><input type="date" name="dob" value="<?= $row['dob'] ?>">
		</span></p>
		
		<p><label>Jenis Kelamin: </label>
		<span><select name="sex">
		<option value='0' <?php if($row['sex']=='0') echo 'selected' ?>>Female</option>
		<option value='1' <?php if($row['sex']=='1') echo 'selected' ?>>Male</option>
		</select></span></p>
		
		<p><label>Nama Ayah: </label> 
		<span><select name="dad"><option value=''></option>
		<?php
			require_once 'meekrodb.2.2.class.php';
			$listname = DB::query("SELECT * FROM umat WHERE sex='1' ORDER BY name ASC");

			foreach ($listname as $lname) {
				echo "<option value='".$lname['id']."'";
					if($row['dad'] == $lname['id']){ echo " selected"; }
				echo ">".$lname['name']."</option>";
			}
		?>
		</select></span></p>
		
		<p><label>Nama Ibu: </label>
		<span><select name="mom"><option value=''></option>
		<?php
			$listname = DB::query("SELECT * FROM umat WHERE sex='0' ORDER BY name ASC");

			foreach ($listname as $lname) {
				echo "<option value='".$lname['id']."'";
					if($row['mom'] == $lname['id']){ echo " selected"; }
				echo ">".$lname['name']."</option>";
			}
		?>
		</select>
		</span></p>		
		
		<p><label>Kepala Keluarga: </label> 
		<span><select name="head"><option value=''></option>
		<?php
			require_once 'meekrodb.2.2.class.php';
			$listname = DB::query("SELECT * FROM umat WHERE sex='1' ORDER BY name ASC");

			foreach ($listname as $lname) {
				echo "<option value='".$lname['id']."'";
					if($row['head'] == $lname['id']){ echo " selected"; }
				echo ">".$lname['name']."</option>";
			}
		?>
		</select></span></p>
		
		<p><label>Nomor Telepon: </label>
		<span><input type="text" name="hp" value="<?= $row['hp'] ?>" pattern="[0-9]*">
		</span></p>
		
		<p><label>Pendidikan / Gelar: </label>
		<span><input type="text" name="edu" value="<?= $row['edu'] ?>">
		</span></p>
		
		<p><label>Pekerjaan: </label>
		<span><select name="work">
		<?php
			$listwork = DB::query("SELECT * FROM works");
			foreach ($listwork as $lwork) {
				echo "<option value='".$lwork['idwork']."'";
					if($row['work'] == $lwork['idwork']){ echo " selected"; }
				echo">".$lwork['wname']."</option>";
			}
		?>
		</select>
		</span></p>
		
		<p><label>Sekolah: </label>
		<span><input type="text" name="study" value="<?= $row['study'] ?>">
		</span></p>
		
		<p><label>Golongan Darah: </label>
		<span><select name="blood">
		<option value='a' <?php if($row['blood']=='a') echo 'selected' ?>>A</option>
		<option value='b' <?php if($row['blood']=='b') echo 'selected' ?>>B</option>
		<option value='ab' <?php if($row['blood']=='ab') echo 'selected' ?>>AB</option>
		<option value='0' <?php if($row['blood']=='0') echo 'selected' ?>>0</option>
		</select>
		</span></p>	
		
		<p><label>Suku: </label>
		<span><input type="text" name="tribe" value="<?= $row['tribe'] ?>">
		</span></p>
		
		<p><label>Nama Baptis: </label>
		<span><input type="text" name="bname" value="<?= $row['bname'] ?>">
		</span></p>
		<p><label>Place of Baptism: </label>
		<span><input type="text" name="p1" value="<?= $row['p1'] ?>">
		</span></p>
		<p><label>Date of Baptism: </label>
		<span><input type="date" name="d1" value="<?= $row['d1'] ?>">
		</span></p>
		
		<p><label>Place of Confirmation: </label>
		<span><input type="text" name="p2" value="<?= $row['p2'] ?>">
		</span></p>
		<p><label>Date of Confirmation: </label>
		<span><input type="date" name="d2"value="<?= $row['d2'] ?>">
		</span></p>
		
		<p><label>Place of Eucharist: </label>
		<span><input type="text" name="p3"value="<?= $row['d3'] ?>">
		</span></p>
		<p><label>Date of Eucharist: </label>
		<span><input type="date" name="d3"value="<?= $row['p3'] ?>">
		</span></p>
		
		<p><label>Place of Penance (Reconcilitation): </label>
		<span><input type="text" name="p4"value="<?= $row['p4'] ?>">
		</span></p>
		<p><label>Date of Penance (Reconcilitation): </label>
		<span><input type="date" name="d4"value="<?= $row['d4'] ?>">
		</span></p>
		
		<p><label>Place of Anointing of The Sick: </label>
		<span><input type="text" name="p5"value="<?= $row['p5'] ?>">
		</span></p>
		<p><label>Date of Anointing of The Sick: </label>
		<span><input type="date" name="d5"value="<?= $row['d5'] ?>">
		</span></p>	
		
		<p><label>Place of Holy Orders: </label>
		<span><input type="text" name="p6"value="<?= $row['p6'] ?>">
		</span></p>
		<p><label>Date of Holy Orders: </label>
		<span><input type="date" name="d6"value="<?= $row['d6'] ?>">
		</span></p>
		
		<p><label>Place of Matrimony (Marriage): </label>
		<span><input type="text" name="p7"value="<?= $row['p7'] ?>">
		</span></p>
		<p><label>Date of Matrimony (Marriage): </label>
		<span><input type="date" name="d7"value="<?= $row['d7'] ?>">
		</span></p>
		
		<p><label>Date of Community-Based Change: </label>
		<span><input type="date" name="dkombas" value="<?= $row['dkombas'] ?>">
		</span></p>
		
		<p><label>Date of Parish Change: </label>
		<span><input type="date" name="dparoki" value="<?= $row['dparoki'] ?>">
		</span></p>
		
		<p><label>Date of Diocese Change: </label>
		<span><input type="date" name="duskup" value="<?= $row['duskup'] ?>">
		</span></p>
		
		<p><label>Date of Death: </label>
		<span><input type="date" name="dod" value="<?= $row['dod'] ?>">
		</span></p>
		
		<p><label>&nbsp; </label>
		<span><input type="submit" class="button">
		</span></p>
	</form>

</body>
</html>
