<?php 
    session_start();
    if(isset($_SESSION['user_login'])) {
        define("ISLOGGED",true);
        include_once "../../../config/connectDB.php";
        if(isset($_GET['comm_id'])) {
            $comm_id = $_GET['comm_id'];
            $sql_delete = "DELETE FROM comment WHERE comm_id=$comm_id";
            mysqli_query($conn, $sql_delete);
            header("location: ../../index.php?page=comment");
        }
    }
?>
