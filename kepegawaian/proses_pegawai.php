<?php
if(isset($_POST['aksi'])){
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$foto = "";
	$dir = "img/";
	$tmpFile = "";
	if ($_FILES['foto']) {
		$foto = $nip.".jpg";
		$tmp_file = $_FILES['foto']['tmp_name'];
		move_uploaded_file($tmp_file, $dir.$nip.".jpg");
	}

	if($_POST['aksi'] == "add"){
		$query = "INSERT INTO tb_pegawai VALUES (null, '$nip', '$nama', '$jenis_kelamin', '$alamat', '$foto') ";
		$sql = mysqli_query($conn, $query);

		if ($sql){
			$message = "Data Berhasil Ditambahkan!";
			echo "<script type='text/javascript'>alert('$message'); location.href = '../';</script>";
				//header("location: ../");
		} else {
			echo $query;
		}
	} else if ($_POST['aksi'] == "edit"){
		$id_pegawai = $_POST['id_pegawai'];
		$qry_foto = "";
		if($foto != "") { 
			$qry_foto = " , foto = '$foto' "; 
		}
		$query = "UPDATE tb_pegawai SET nip = '$nip', nama = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat' ".$qry_foto." WHERE id_pegawai = '$id_pegawai' ";
		$sql = mysqli_query($conn, $query);

		if ($sql){
			$message = "Data Berhasil Diubah!";
			echo "<script type='text/javascript'>alert('$message'); location.href = '../';</script>";
				//header("location: ../");
		} else {
			echo $query;
		}	
	}
}

if(isset($_GET['hapus'])){
	$id_pegawai = $_GET['hapus'];
	$query_select = "SELECT foto FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'";
	$sql_select = mysqli_query($conn, $query_select);
	$query = "DELETE FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'";
	$sql = mysqli_query($conn, $query);
	if ($sql){
		if ($sql_select){
			$result = mysqli_fetch_assoc($sql_select);
			$foto = $result["foto"];
			unlink("img/".$foto);
		}
		$message = "Data Berhasil Dihapus!";
		echo "<script type='text/javascript'>alert('$message'); location.href = '../';</script>";
				//header("location: ../");
	} else {
		echo $query;
	}
}
?>