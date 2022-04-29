<?php
 define('Db_server', 'localhost:3307');
 define('Db_user', 'root');
 define('Db_pass', '');
 define('Db_name','ims_db');

 $link = mysqli_connect(Db_server,Db_user,Db_pass,Db_name);

 if($link === false){
 	die("ERROR: Could not connect. ".mysqli_connect_error());
 } 
?>