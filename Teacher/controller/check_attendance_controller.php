<?php 
session_start();
include "../db_con.php";

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $date = date('Y-m-d');
    $status = $_POST['status'];
    $code = $_POST['code'];
    $shift = $_POST['shift'];

    $sql = "INSERT INTO attendance(class, teacher_name, subject, date, shift, code, status) 
        VALUES('$class', '$name', '$subject', '$date', '$shift', '$code', '$status')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql1 = "INSERT INTO attendance_history(class, subject, date, shift, teacher_name, teacher_status)
            VALUES('$class', '$subject', '$date', '$shift', '$name', '$status')";
        $result1 = mysqli_query($conn, $sql1);
        if ($result1) {
            $sql2 = "SELECT * FROM students WHERE class = '$class'";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2->num_rows > 0){
                while ($row2=$result2-> fetch_assoc()){
                    if ($status == 'Present'){
                        $student_id = $row2['student_id'];
                        $student_name = $row2['fullname'];
                        $sql3 = "INSERT INTO attendance_history(class,subject,date,shift,teacher_name,teacher_status,student_id,student_name,student_status)
                        VALUES('$class','$subject','$date','$shift','$name','$status','$student_id','$student_name','Absence')";
                        $result3 = mysqli_query($conn, $sql3);
                        header("Location: ../view/attendance.php");
                    } else {
                        header("Location: ../view/attendance.php");
                    }
                }
            }
        }
    }
}