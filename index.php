
<?php
$db_host = "localhost";
$db_user = "yogi";
$db_pass ="Dbdigitalocean2021!";
$db_name 	="project_gis_pasarcisaat";


 
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{
	echo 'Koneksi berhasil ^_^';
}


$nama_db = 'project_gis_pasarcisaat';
$user_db = 'yogi';
$kata_sandi = 'Dbdigitalocean2021!';
$nama_host = 'localhost';
$koneksi = mysqli_connect($nama_host, $user_db, $kata_sandi) or die("Tidak bisa tersambung ke '$nama_host'");
mysqli_select_db($koneksi, $nama_db) or die("Tidak bisa membuka database '$nama_db'");
$uji_query = "SHOW TABLES FROM $nama_db";
$hasil = mysqli_query($link, $uji_query);
$hitung_tabel = 0;
while($tabel = mysqli_fetch_array($hasil)) {
  $hitung_tabel++;
}
if (!$hitung_tabel) {
  echo "Tidak ada tabel<br />\n";
} else {
  echo "Ada $hitung_tabel tabel<br />\n";
}