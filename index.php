
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


$uji_query = "select * from admin";
$hasil = mysqli_query($koneksi, $uji_query);
$hitung_tabel = 0;
while($tabel = mysqli_fetch_array($hasil)) {
  $hitung_tabel++;
}
if (!$hitung_tabel) {
  echo "Tidak ada tabel<br />\n";
} else {
  echo "Ada $hitung_tabel tabel<br />\n";
}