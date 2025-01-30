<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['cat_id'])) {
            $cat_id = $_GET['cat_id'];
            $sql_delete = "DELETE FROM category WHERE cat_id=$cat_id";
            mysqli_query($conn, $sql_delete);
            header("location: ../../index.php?page=category");
        }
    }
?>
