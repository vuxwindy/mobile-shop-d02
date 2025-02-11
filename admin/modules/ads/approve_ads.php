<?php

session_start();
if(isset($_SESSION['user_login'])) {
    define("ISLOGGED",true);
    include_once "../../../config/connectDB.php";
    if (isset($_GET['ads_id'])) {
        $ads_id = $_GET['ads_id'];

        // Cập nhật trạng thái đơn hàng
        $sql_approve = "UPDATE ads SET status='1' WHERE ads_id=$ads_id";

     mysqli_query($conn, $sql_approve);
            header("location: ../../index.php?page=ads");
           
       
}}
?>
