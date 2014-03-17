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
		$row = DB::queryFirstRow("SELECT * FROM cards WHERE idcard=%i", $id);
		//echo $row['kepala'];
		$listumat = DB::query("SELECT * FROM umat WHERE head=%i", $row['kepala']);
	?>
</head>
<body>
	<form class="fform" action="cardC.php" method="post">
		<p><label>Paroki: </label> 
		<span><input type="text" name="paroki" value="<?= $row['paroki'] ?>">
		</span></p>
		
		<p><label>Komunitas Basis: </label>
		<span><input type="text" name="kombas" value="<?= $row['kombas'] ?>">
		</span></p>
		
		<p><label>Kepala Keluarga: </label> 
		<span><select name="kepala"><option value=''></option>
		<?php
			$listname = DB::query("SELECT * FROM umat WHERE sex='1' ORDER BY name ASC");

			foreach ($listname as $lname) {
				echo "<option value='".$lname['id']."'";
					if($row['kepala'] == $lname['id']){ echo " selected"; }
				echo ">".$lname['name']."</option>";
			}
		?>
		</select></span></p>
		
		<p><label>Alamat: </label>
		<span><input type="text" name="alamat" value="<?= $row['alamat'] ?>">
		</span></p>
		<p><label>RT/RW: </label>
		<span><input type="text" name="rtrw" value="<?= $row['rtrw'] ?>">
		</span></p>
		<p><label>Desa/Kelurahan: </label>
		<span><input type="text" name="desa" value="<?= $row['desa'] ?>">
		</span></p>
		<p><label>Kecamatan/Distrik: </label>
		<span><input type="text" name="kec" value="<?= $row['kec'] ?>">
		</span></p>
		<p><label>Kabupaten/Kota: </label>
		<span><input type="text" name="kab" value="<?= $row['kab'] ?>">
		</span></p>
		<p><label>Kode Pos: </label>
		<span><input type="number" name="zip" value="<?= $row['zip'] ?>">
		</span></p>
		<p><label>Telepon Rumah: </label>
		<span><input type="text" name="hno" value="<?= $row['hno'] ?>" pattern="[0-9]*">
		</span></p>
		<p><label>Telepon Kantor: </label>
		<span><input type="text" name="ono" value="<?= $row['ono'] ?>" pattern="[0-9]*">
		</span></p>
		<p><label>Tahun Bergabung Kombas: </label>
		<span><input type="text" name="join" value="<?= $row['join'] ?>" pattern="[0-9]*">
		</span></p>
		
		<p><label>Tempat Pernikahan: </label>
		<span><input type="text" name="pom" value="<?= $row['pom'] ?>">
		</span></p>
		<p><label>Tanggal Pernikahan: </label>
		<span><input type="date" name="dom" value="<?= $row['dom'] ?>">
		</span></p>
		
		<p><label>Keduanya Katolik: </label>
		<span><input class="rradio" type="radio" name="kdua" value="0" <?php if ($row['kdua'] == 0) echo 'checked' ?>>No
		<input  class="rradio" type="radio" name="kdua" value="1" <?php if ($row['kdua'] == 1) echo 'checked' ?>>Yes
		</span></p>
		
		<p><label>Ijin Beda Gereja: </label>
		<span><input class="rradio" type="radio" name="beda" value="0" <?php if ($row['beda'] == 0) echo 'checked' ?>>No
		<input  class="rradio" type="radio" name="beda" value="1" <?php if ($row['beda'] == 1) echo 'checked' ?>>Yes
		</span></p>
		
		<p><label>Dispensasi: </label>
		<span><select name="dispen">
		<option value='0' <?php if($row['dispen']=='0') echo 'selected' ?>>-</option>
		<option value='aai' <?php if($row['dispen']=='aai') echo 'selected' ?>>Antar Agama Katolik dan Islam</option>
		<option value='aab' <?php if($row['dispen']=='aab') echo 'selected' ?>>Antar Agama Katolik dan Budha</option>
		<option value='aah' <?php if($row['dispen']=='aah') echo 'selected' ?>>Antar Agama Katolik dan Hindu</option>
		<option value='aag' <?php if($row['dispen']=='aag') echo 'selected' ?>>Antar Agama Katolik dan Diragukan</option>
		</select>
		</span></p>	
		
		<p><label>Catatan Sipil: </label>
		<span><input class="rradio" type="radio" name="sipil" value="0" <?php if ($row['sipil'] == 0) echo 'checked' ?>>No
		<input  class="rradio" type="radio" name="sipil" value="1" <?php if ($row['sipil'] == 1) echo 'checked' ?>>Yes
		</span></p>
		
		<p><label>Luar Gereja: </label>
		<span><input class="rradio" type="radio" name="luar" value="0" <?php if ($row['luar'] == 0) echo 'checked' ?>>No
		<input  class="rradio" type="radio" name="luar" value="1" <?php if ($row['luar'] == 1) echo 'checked' ?>>Yes
		</span></p>
		
		<p><label>KUA: </label>
		<span><input class="rradio" type="radio" name="kua" value="0" <?php if ($row['kua'] == 0) echo 'checked' ?>>No
		<input  class="rradio" type="radio" name="kua" value="1" <?php if ($row['kua'] == 1) echo 'checked' ?>>Yes
		</span></p>
		
		<?php
		
		foreach($listumat as $umat){
			echo "<p><label>".$umat['name']."</label>";
			echo "<span><a href='umatCreate.php?id=".$umat['id']."'>Edit</a></span></p>";
		}
		?>
		
		<p><label>&nbsp; </label>
		<span><input type="submit" class="button">
		</span></p>
	</form>

</body>
</html>
