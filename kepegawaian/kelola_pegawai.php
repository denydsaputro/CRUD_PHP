<?php 
$query = "";
$sql = "";
$id_pegawai = '';
$nip = '';
$nama = '';
$jenis_kelamin = '';
$alamat = '';
if(isset($_GET['id'])){
	$query = "SELECT * FROM tb_pegawai WHERE id_pegawai = '". $_GET['id'] ."'";
	$sql = mysqli_query($conn, $query);
}
if ($sql) { 
	$result = mysqli_fetch_assoc($sql); 
	$id_pegawai = $result['id_pegawai'];
	$nip = $result['nip'];
	$nama = $result['nama'];
	$jenis_kelamin = $result['jenis_kelamin'];
	$alamat = $result['alamat'];
};
?>
<form id="myForm" method="POST" action="?p=proses_pegawai" enctype="multipart/form-data">
	<h2>Pengelolahan Data Pegawai</h2>
	<div style="background-color: lightgray; padding: 20px; border: 1px solid lightgray; border-radius: 10px;">
		<input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $id_pegawai; ?>">
		<div class="row">
			<div class="col-1"><label for="nip">NIP :</label></div>	
			<input type="text" name="nip" id="nip" class="col-2" value="<?php echo $nip; ?>" required>	
		</div>
		<div class="row">
			<div class="col-1"><label for="nama">Nama :</label></div>	
			<input type="text" name="nama" id="nama" class="col-2" value="<?php echo $nama; ?>" required>	
		</div>
		<div class="row">
			<div class="col-1"><label for="jenis_kelamin">Jenis Kelamin :</label></div>	
			<select class="col-2" name="jenis_kelamin" id="jenis_kelamin" required>
				<option value="L" <?php if($jenis_kelamin == "L") { echo "selected"; } ?>>Laki-Laki</option>
				<option value="P" <?php if($jenis_kelamin == "P") { echo "selected"; } ?>>Perempuan</option>
			</select>
		</div>
		<div class="row">
			<div class="col-1"><label for="alamat">Alamat :</label></div>	
			<textarea type="text" name="alamat" id="alamat" class="col-2" required><?php echo $alamat; ?></textarea>
		</div>
		<div class="row">
			<div class="col-1"><label for="foto">Foto :</label></div>	
			<input type="file" name="foto" id="foto" class="col-2" accept="image/jpeg"></input>
		</div>
		<div class="row">
			<div class="col-2">
				<?php 
				if ($id_pegawai != ""){
					echo "<button type='submit' class='btn btn-sm btn-success' name='aksi' value='edit'>Ubah</button>";	
				} else {
					echo "<button type='submit' class='btn btn-sm btn-success' name='aksi' value='add'>Tambah</button>";
				}
				?>
				<a href="../" class="btn btn-sm btn-warning">Batal</a>
			</div>	
		</div>
	</div>
</form>