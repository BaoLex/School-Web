<?php 
session_start();
include "../db_con.php";

if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $date = $_POST['date'];
    $type = $_POST['type'];

    $sql = "SELECT * FROM classes WHERE class = '$class'";
	$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $sql1 = "SELECT * FROM subjects WHERE subject = '$subject'";
        $result1 = mysqli_query($conn, $sql1);
        if (mysqli_num_rows($result1) > 0){
            $sql2 = "INSERT INTO exam(type, title, class, subject, date) VALUES('$type', '$title', '$class', '$subject', '$date')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
                header("Location: ../view/exam.php");
            }
        } else {
            header("Location: ../view/assign_exam.php");
        }
    }else {
        header("Location: ../view/assign_exam.php");
    }
}