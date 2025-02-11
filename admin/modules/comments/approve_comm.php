<?php

session_start();
if(isset($_SESSION['user_login'])) {
    define("ISLOGGED",true);
    include_once "../../../config/connectDB.php";
    if (isset($_GET['comm_id'])) {
        $comm_id = $_GET['comm_id'];

        // Cập nhật trạng thái đơn hàng
        $sql_approve = "UPDATE comment SET status='1' WHERE comm_id=$comm_id";

     mysqli_query($conn, $sql_approve);
            header("location: ../../index.php?page=comment");
           
       
}}
?>
