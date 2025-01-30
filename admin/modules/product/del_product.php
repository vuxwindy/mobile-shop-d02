<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['prd_id'])) {
            $prd_id = $_GET['prd_id'];
            $sql_delete = "DELETE FROM product WHERE prd_id=$prd_id";
            mysqli_query($conn, $sql_delete);
            header("location: ../../index.php?page=product");
        }
    }
?>
