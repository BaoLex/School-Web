<?php 
session_start(); 
include "../db_con.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "UPDATE score SET status = 'Verify' WHERE score_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../view/score.php");
    }
}