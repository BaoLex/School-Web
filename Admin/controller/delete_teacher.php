<?php 
session_start(); 
include "../db_con.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM teachers WHERE teacher_id = '$id'";
    $result = mysqli_query($conn,$sql);
    if ($result) {  
        header("Location: ../view/teacher.php");
    }
}