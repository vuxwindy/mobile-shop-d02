<?php 
$serverName = 'localhost';
$userName = 'root';
$password = '';
<<<<<<< HEAD
$database = 'bkd04k12';
=======
$database = 'bkd02';
>>>>>>> a7fd777 (đã thay đổi tên datagit)

$conn = mysqli_connect($serverName, $userName, $password, $database);

if(!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}else{
    mysqli_set_charset($conn, "utf8");
}
?>