<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['user_id'])) {
            $user_id = $_GET['user_id'];
            $sql_delete = "DELETE FROM user WHERE user_id=$user_id";
            mysqli_query($conn, $sql_delete);
            header("location: ../../index.php?page=user");
        }
    }
?>
