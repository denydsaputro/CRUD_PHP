<?php
$query = "SELECT * FROM tb_pegawai";
$sql = mysqli_query($conn, $query);

$no = 0;
?>

<h2>Data Kepegawaian</h2>
<div><a href="?p=kelola_pegawai" class="btn btn-sm btn-primary">Tambah Baru</a></div>
<div style="margin-top: 10px">
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Alamat</th>
				<th>Foto</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php while($result = mysqli_fetch_assoc($sql)) { ?>
				<tr>
					<td class="text-center"><?php echo ++$no; ?></td>
					<td><?php echo $result['nip']; ?></td>
					<td><?php echo $result['nama']; ?></td>
					<td class="text-center"><?php if ($result['jenis_kelamin'] == "L" ) { echo "Laki-laki"; } else { echo "Perempuan";}; ?></td>
					<td><?php echo $result['alamat']; ?></td>
					<td class="text-center"><img src="img/<?php echo $result['foto']; ?>" style="width:80px"/></td>
					<td>
						<a href="?p=kelola_pegawai&id=<?php echo $result['id_pegawai']; ?>" class="btn btn-sm btn-success">Ubah</a>
						<a href="?p=proses_pegawai&hapus=<?php echo $result['id_pegawai']; ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin ingin mengapus data <?php echo $result['nama']; ?>?')">Hapus</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>