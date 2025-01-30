<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['order_id'])) {
            $order_id = $_GET['order_id'];
            $sql_delete = "DELETE FROM orders WHERE order_id=$order_id";
            mysqli_query($conn, $sql_delete);
            header("location: ../../index.php?page=order");
        }
    }
?>
