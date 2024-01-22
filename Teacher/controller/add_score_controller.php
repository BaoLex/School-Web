<?php 
session_start();
include "../db_con.php";

if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $score = $_POST['score'];
    $today = date('Y-m-d H:i:s');
    
    $sql = "UPDATE score SET score_before = '$score', date = '$today', status = 'Initial'
        WHERE score_id = '$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: ../view/score.php");
}