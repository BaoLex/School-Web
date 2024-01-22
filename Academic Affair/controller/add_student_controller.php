<?php 
session_start(); 
include "../db_con.php";

if (isset($_POST['submit'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $section = $_POST['section'];
    $class = $_POST['class'];

	if (empty($name)) {
		header("Location: ../view/add_student.php");
	    exit();
	} else if (empty($fname)){
        header("Location: ../view/add_student.php");
	    exit();
	} else if (empty($id)){
        header("Location: ../view/add_student.php");
	    exit();
    } else {

	    $sql = "SELECT * FROM students WHERE student_id = '$id' or username = '$name' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../view/add_student.php");
	        exit();
		}else {
           	$sql2 = "INSERT INTO students(student_id, username, fullname, gender, address, phone, section, class, role) VALUES('$id','$name','$fname','$gender','$address','$phone','$section','$class','student')";
           	$result2 = mysqli_query($conn, $sql2);
           	if ($result2) {
				$sql3 = "INSERT INTO verify_account(username, password, role) values('$name','123', 'student')";
				$result3 = mysqli_query($conn, $sql3);
                header("Location: ../view/student.php");
                exit();
           	}else {
                header("Location: ../view/add_student.php");
		        exit();
           	}
		}
	}
	
}else{
	header("Location: ../view/add_student.php");
	exit();
}