<?php 
session_start(); 
include "../db_con.php";

if (isset($_POST['submit'])){
    $class  = $_POST['class'];
    $title = $_POST['title'];
    $fee = $_POST['fee'];
    $staff_name = $_POST['staff_name'];
    $today = date('Y-m-d');

    $sql = "SELECT * FROM students WHERE class = '$class'";
	$result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['student_id'];
            $name = $row['fullname'];
            $sql1 = "INSERT INTO fees(accountant_name,class,student_id,student_name,fee,title,date,status)
                VALUES('$staff_name','$class','$id','$name','$fee','$title','$today','Unpaid')";
            $result1 = mysqli_query($conn, $sql1);
            header("Location: ../view/transaction.php");
        }
    }
    
}



