<?php 
session_start();
include "../db_con.php";

if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $date = date('Y-m-d');
    $code = $_POST['code'];
    $shift = $_POST['shift'];
    $sql = "SELECT * FROM attendance WHERE code = '$code' AND date = '$date' AND status = 'Present'";
    $result = mysqli_query($conn, $sql);
    if ($result -> num_rows > 0) {
        $row=$result-> fetch_assoc();
        $teacher_name = $row['teacher_name'];
        $status = $row['status'];
        $sql1 = "UPDATE attendance_history SET student_status = 'Present'
        WHERE student_id = '$id' and class = '$class' and subject = '$subject' and date = '$date' and shift = '$shift'";
        $result1 = mysqli_query($conn, $sql1);
        if ($result1){
            header("Location: ../view/attendance.php");
        }
    } else {
        header("Location: ../view/timetable.php");
    }
}