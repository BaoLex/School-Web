<?php 
session_start(); 
include "../db_con.php";

if (isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $subject = $_POST['subject'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "UPDATE teachers SET subject='$subject', gender='$gender', address='$address', phone='$phone'
        where fullname='$fname'";
	$result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../view/teacher.php");
    }
}
