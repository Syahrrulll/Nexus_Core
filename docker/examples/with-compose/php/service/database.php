<?php

$hostname = 'mysql_db';
$username = 'root';
$password = 'awvx0563';
$database_name = 'bioskop';


$db = mysqli_connect($hostname, $username, $password, $database_name);

if ($db->connect_error) {
    die("error!");
}else{
    
}
