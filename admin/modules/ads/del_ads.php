<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['ads_id'])) {
            $ads_id = $_GET['ads_id'];
            $sql_delete = "DELETE FROM ads WHERE ads_id=$ads_id";
            mysqli_query($conn, $sql_delete);
            header("location: ../../index.php?page=ads");
        }
    }
?>
