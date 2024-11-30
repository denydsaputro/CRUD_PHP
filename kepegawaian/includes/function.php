<?php 
	function tambah_data($data, $files){
		$nip = $data['nip'];
		$nama = $data['nama'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat = $data['alamat'];
		$foto = "";
		$dir = "img/";
		$tmpFile = "";
		if ($files['foto']) {
			$foto = $nip.".jpg";
			$tmp_file = $files['foto']['tmp_name'];
			move_uploaded_file($tmp_file, $dir.$nip.".jpg");
		}

		$query = "INSERT INTO tb_pegawai VALUES (null, '$nip', '$nama', '$jenis_kelamin', '$alamat', '$foto') ";
		$sql = mysqli_query( $GLOBALS['conn'], $query);

		if ($sql){
			return true;
		} else {
			return $sql;
		}
	}

	function ubah_data($data, $files){
		$nip = $data['nip'];
		$nama = $data['nama'];
		$jenis_kelamin = $data['jenis_kelamin'];
		$alamat = $data['alamat'];
		$foto = "";
		$dir = "img/";
		$tmpFile = "";
		if ($files['foto']) {
			$foto = $nip.".jpg";
			$tmp_file = $files['foto']['tmp_name'];
			move_uploaded_file($tmp_file, $dir.$nip.".jpg");
		}
		$id_pegawai = $data['id_pegawai'];
		$qry_foto = "";
		if($foto != "") { 
			$qry_foto = " , foto = '$foto' "; 
		}
		$query = "UPDATE tb_pegawai SET nip = '$nip', nama = '$nama', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat' ".$qry_foto." WHERE id_pegawai = '$id_pegawai' ";
		$sql = mysqli_query($GLOBALS['conn'], $query);

		if ($sql){
			return true;
		} else {
			return $sql;
		}
	}

	function hapus_data($data){
		$id_pegawai = $data['hapus'];
		$query_select = "SELECT foto FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'";
		$sql_select = mysqli_query($GLOBALS['conn'], $query_select);
		$query = "DELETE FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'";
		$sql = mysqli_query($GLOBALS['conn'], $query);
		if ($sql){
			if ($sql_select){
				$result = mysqli_fetch_assoc($sql_select);
				$foto = $result["foto"];
				unlink("img/".$foto);
			}
			return true;
		} else {
			return $sql;
		}
	}
?>