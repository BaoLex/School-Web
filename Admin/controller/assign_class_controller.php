<?php 
session_start();
include "../db_con.php";

if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $name = $_POST['name'];

    $sql = "SELECT * FROM teacher_class WHERE class = '$class' and teacher_id = '$id'";
	$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../view/assign_class.php");
    }else {
        $sql2 = "INSERT INTO teacher_class(teacher_id, teacher_name, class, subject) VALUES('$id', '$name', '$class', '$subject')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            header("Location: ../view/fee.php");
        }
    }
}