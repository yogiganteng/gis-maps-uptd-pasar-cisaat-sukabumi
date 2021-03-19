<?php
	ini_set('display_errors',FALSE);
	$db_host = "localhost";
	$db_user = "yogi";
	$db_pass ="Dbdigitalocean2021!";
	$db_name 	="project_gis_pasarcisaat";
	
	
	 
	$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	 
	if(mysqli_connect_errno()){
		echo 'Gagal melakukan koneksi ke Database : '.mysqlii_connect_error();
	}else{
		echo 'Koneksi berhasil ^_^';
	}
?>