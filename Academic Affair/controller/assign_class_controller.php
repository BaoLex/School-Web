<?php 
session_start(); 
include "../db_con.php";

if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];

    $sql = "SELECT * FROM teacher_class WHERE teacher_id = '$id' and class = '$class' ";
	$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        header("Location: ../view/assign_class.php");
    } else {
        $sql1 = "SELECT * FROM classes WHERE class = '$class'";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0){
            $sql2 = "INSERT INTO teacher_class(teacher_id, teacher_name, class, subject) 
                VALUES('$id', '$name', '$class', '$subject')";
            $result2 = mysqli_query($conn, $sql2);
            header("Location: ../view/teacher.php");
        } else {
            header("Location: ../view/assign_class.php");
        }
    }
}
