<?php 
session_start(); 
include "../db_con.php";

if (isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $section = $_POST['section'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students SET section='$section', class='$class', gender='$gender', address='$address', phone='$phone'
        where fullname='$fname'";
	$result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../view/student.php");
    }
}
