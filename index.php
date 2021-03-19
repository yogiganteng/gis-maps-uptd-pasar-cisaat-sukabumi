
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




$host		="localhost";
$user		="yogi";
$pass		="Dbdigitalocean2021!";
$db 		="project_gis_pasarcisaat";

$koneksi2=mysql_connect($host,$user,$pass);
mysql_select_db($db,$koneksi);	

if(mysql_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysql_connect_error();
}else{
	echo 'Koneksi berhasil ^_^';
}