<?php

session_start();
if(isset($_SESSION['user_login'])) {
    define("ISLOGGED",true);
    include_once "../../../config/connectDB.php";
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];

        // Cập nhật trạng thái đơn hàng
        $sql_approve = "UPDATE orders SET status='0' WHERE order_id=$order_id";

     mysqli_query($conn, $sql_approve);
            header("location: ../../index.php?page=order");
           
       
}}
?>
