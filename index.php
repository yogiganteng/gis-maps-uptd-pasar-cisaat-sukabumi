 <?php
$koneksi = mysqli_connect("localhost","yogi","Dbdigitalocean2021!","project_gis_pasarcisaat");
 
 // Check connection
 if (mysqli_connect_errno()){
     echo "Koneksi database gagal : " . mysqli_connect_error();
 }else{
     echo 'ok';
 }
 
 ?>