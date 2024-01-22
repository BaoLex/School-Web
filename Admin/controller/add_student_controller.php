<?php 
session_start(); 
include "../db_con.php";

if (isset($_POST['name']) && isset($_POST['pass'])
    && isset($_POST['fname']) && isset($_POST['gender'])
        && isset($_POST['address']) && isset($_POST['phone'])
            && isset($_POST['section']) && isset($_POST['class']) && isset($_POST['id'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $fname = $_POST['fname'];
    $pass = $_POST['pass'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $section = $_POST['section'];
    $class = $_POST['class'];

	if (empty($name)) {
		header("Location: ../view/add_student.php");
	    exit();
	} else if (empty($pass)){
        header("Location: ../view/add_student.php");
	    exit();
	} else if (empty($id)){
        header("Location: ../view/add_student.php");
	    exit();
    } else {

	    $sql = "SELECT * FROM students WHERE student_id = '$id' and username = '$name' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../view/add_student.php");
	        exit();
		}else {
           	$sql2 = "INSERT INTO students(student_id, username, fullname, gender, address, phone, section, class, password) VALUES('$id','$name','$fname','$gender','$address','$phone','$section','$class','$pass')";
           	$result2 = mysqli_query($conn, $sql2);
           	if ($result2) {
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