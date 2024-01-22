<?php 
session_start(); 
include "../db_con.php";

if (isset($_GET['id']) && isset($_GET['class'])) {
    $id = $_GET['id'];
    $class = $_GET['class'];
    $sql = "DELETE FROM teacher_class WHERE teacher_id = '$id' and class = '$class'";
    $result = mysqli_query($conn,$sql);
    if ($result) {  
        header("Location: ../view/teacher.php");
    }
}