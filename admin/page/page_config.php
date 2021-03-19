<?php
	ini_set('display_errors',FALSE);

	$host		="localhost";
	$user		="yogi";
	$pass		="Dbdigitalocean2021!";
	$db 		="project_gis_pasarcisaat";

	$koneksi=mysqli_connect($host,$user,$pass);
	mysqli_select_db($db,$koneksi);	
?>