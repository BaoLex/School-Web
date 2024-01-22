<?php 
session_start();
include "../db_con.php";

if (isset($_POST['submit'])){
    $name = $_POST['teacher_name'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $type = $_POST['type'];
    $today = date('Y-m-d');

    $sql2 = "SELECT * FROM teacher_class WHERE teacher_name = '$name' AND class = '$class'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2->num_rows > 0){
        $sql = "SELECT * FROM students WHERE class = '$class'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0){
            while ($row=$result-> fetch_assoc()){
                $student_id = $row['student_id'];
                $student_name = $row['fullname'];
                $sql1 = "INSERT INTO score(student_id, student_name, teacher_name, class, type, subject, date)
                    VALUES('$student_id', '$student_name', '$name', '$class', '$type', '$subject', '$today')";
                $result1 = mysqli_query($conn, $sql1);
                header("Location: ../view/score.php");
            }
        } else {
            header("Location: ../view/attach_score.php");
        }
    } else {
        header("Location: ../view/attach_score.php");
    }
}