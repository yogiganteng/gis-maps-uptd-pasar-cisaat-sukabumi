<?php
	ini_set('display_errors',FALSE);

	$host		="localhost";
	$user		="root";
	$pass		="";
	$db 		="project_gis_pasarcisaat";

	$koneksi=mysql_connect($host,$user,$pass);
	mysql_select_db($db,$koneksi);	
?>