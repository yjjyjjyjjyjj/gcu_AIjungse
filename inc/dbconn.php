<?php
//개발서버
$host="localhost";
$user="root";
$pass="1234";
$dbname= "gugujuljul";

////실서버
//$host="localhost";
//$user="gugujuljul";
//$pass="gachon2024!";
//$dbname= "gugujuljul";

$conn = mysqli_connect($host, $user, $pass, $dbname);
mysqli_set_charset($conn, "utf8");