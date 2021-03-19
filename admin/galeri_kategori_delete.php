<?php  
	include '../page/page_config.php';

	$id = base64_decode($_GET['id']);

	$query = mysqli_query($koneksi,"SELECT * FROM galeri_kategori WHERE id='$id'") or die (mysqli_error('tabel tidak ditemukan'));
	$data  = mysqli_fetch_array($query);

	$querydelete = mysqli_query("DELETE FROM galeri_kategori WHERE id='$id'") or die (mysqli_error('tabel tidak ditemukan'));
		unlink($data['gambar']);

	if ($querydelete) {
		echo '<script>alert ("Data berhasil dihapus"); document.location.href="+home.php?page=Z2FsZXJpX2thdGVnb3JpX2lucHV0";</script>';
	}else{
		echo '<script>alert ("Data Gagal dihapus"); document.location.href="+home.php?page=Z2FsZXJpX2thdGVnb3JpX2lucHV0";</script>';
	}
	
?>