<?php 
session_start();
include "../db_con.php";

if (isset($_POST['uname']) &&
    isset($_POST['pass'])) {
	
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../index.php?error=$em");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../index.php?error=$em");
		exit;
	} else {
        $sql = "SELECT * FROM verify_account WHERE username = '$uname' and password = '$pass'";
        $result = $db = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];

            if($role == 'admin'){
                $sql = "SELECT * FROM admin WHERE username = '$uname' AND role = '$role'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../Admin/index.php");
                    exit();
                } else {
                    $em = "Incorrect Name Or Password";
                    header("Location: ../index.php?error=$em");
                    exit();
                }
            }else if($role == 'teacher'){
                $sql = "SELECT * FROM teachers WHERE username = '$uname' AND role = '$role'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../Teacher/index.php");
                    exit(); 
                } else {
                    $em = "Incorrect Name Or Password";
                    header("Location: ../index.php?error=$em");
                    exit();
                }
            }else if($role == 'student'){
                $sql = "SELECT * FROM students WHERE username = '$uname' AND role = '$role'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../Student/index.php");
                    exit();
                } else {
                    $em = "Incorrect Name Or Password";
                    header("Location: ../index.php?error=$em");
                    exit();
                }
            }else if($role == 'accountant'){
                $sql = "SELECT * FROM accountant WHERE username = '$uname' AND role = '$role'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../Accounting Department/index.php");
                    exit();
                } else {
                    $em = "Incorrect Name Or Password";
                    header("Location: ../index.php?error=$em");
                    exit();
                }
            }else if($role == 'staff'){
                $sql = "SELECT * FROM academic_staff WHERE username = '$uname' AND role = '$role'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1){
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['username'] = $row['username'];
                    header("Location: ../Academic Affair/index.php");
                    exit();
                } else {
                    $em = "Incorrect Name Or Password";
                    header("Location: ../index.php?error=$em");
                    exit();
                }
            }
        }
    }
}
    