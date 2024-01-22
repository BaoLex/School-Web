<?php 
session_start(); 
include "../db_con.php";

if (isset($_POST['name']) && isset($_POST['pass'])
    && isset($_POST['fname']) && isset($_POST['gender'])
        && isset($_POST['address']) && isset($_POST['phone'])
            && isset($_POST['id']) && isset($_POST['subject'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];

	if (empty($name)) {
		header("Location: ../view/add_teacher.php");
	    exit();
	} else if (empty($pass)){
        header("Location: ../view/add_teacher.php");
	    exit();
	} else if (empty($id)){
        header("Location: ../view/add_teacher.php");
	    exit();
    } else {

	    $sql = "SELECT * FROM teachers WHERE teacher_id = '$id' and username = '$name' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../view/add_teacher.php");
	        exit();
		}else {
           	$sql2 = "INSERT INTO teachers(teacher_id, username, fullname, gender, address, phone, subject, password) VALUES('$id','$name','$fname','$gender','$address','$phone','$subject','$pass')";
           	$result2 = mysqli_query($conn, $sql2);
           	if ($result2) {
                header("Location: ../view/teacher.php");
                exit();
           	}else {
                header("Location: ../view/add_teacher.php");
		        exit();
           	}
		}
	}
	
}else{
	header("Location: ../view/add_teacher.php");
	exit();
}