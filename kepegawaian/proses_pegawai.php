<?php
include("includes/function.php");
if(isset($_POST['aksi'])){
	if($_POST['aksi'] == "add"){
		$berhasil = tambah_data($_POST, $_FILES);
		if ($berhasil){
			$message = "Data Berhasil Ditambahkan!";
			echo "<script type='text/javascript'>alert('$message'); location.href = '../';</script>";
		} else {
			$message = "Data Gagal Ditambahkan!".$berhasil;;
			echo "<script type='text/javascript'>alert('$message'); location.href = '../?p=kelola_pegawai';</script>";
		}
	} else if ($_POST['aksi'] == "edit"){
		$berhasil = ubah_data($_POST, $_FILES);
		if ($berhasil){
			$message = "Data Berhasil Diubah!";
			echo "<script type='text/javascript'>alert('$message'); location.href = '../';</script>";
		} else {
			$message = "Data Gagal Diubah! ".$berhasil;
			echo "<script type='text/javascript'>alert('$message'); location.href = '../?p=kelola_pegawai&id=".$_POST['id_pegawai']."';</script>";
		}	
	}
}

if(isset($_GET['hapus'])){
	$berhasil = hapus_data($_GET);
	$message = "";
	if ($berhasil){
		$message = "Data Berhasil Dihapus!";
	} else {
		$message = "Data Gagal Dihapus! ".$berhasil;
	}
		echo "<script type='text/javascript'>alert('$message'); location.href = '../';</script>";
}
?>