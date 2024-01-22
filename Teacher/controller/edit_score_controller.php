<?php 
session_start();
include "../db_con.php";

if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $score_before = $_POST['score_before'];
    $score_after = $_POST['score_after'];
    $today = date('Y-m-d H:i:s');
    
    $sql = "UPDATE score SET score_after = '$score_after', date = '$today', status = 'Updated'
        WHERE score_id = '$id'";
    $result = mysqli_query($conn, $sql);
    header("Location: ../view/score.php");
}