<?php 
session_start();
include "../db_con.php";

if (isset($_POST['submit'])){
    $name = $_POST['teacher_name'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $title = $_POST['title'];
    $link = $_POST['link'];
    $deadline = $_POST['deadline'];
    $sql1 = "SELECT * FROM teacher_class WHERE teacher_name = '$name' and class = '$class'";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1->num_rows > 0){
        $sql = "INSERT INTO homework(teacher_name, class, subject, title, link, deadline) VALUES('$name', '$class', '$subject', '$title', '$link', '$deadline')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../view/homework.php");
        }
    } else {
        header("Location: ../view/attach_homework.php");
    }
}