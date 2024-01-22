<?php 
session_start(); 
include "../db_con.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE student_id = '$id'";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        header("Location: ../view/student.php");
    }
}