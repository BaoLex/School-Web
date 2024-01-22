<?php
session_start();
include "./db_con.php";
if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
    $sql = "SELECT * FROM academic_staff WHERE username = '$name'";
    $result=$conn-> query($sql);
    if ($result-> num_rows > 0){
        $row=$result-> fetch_assoc();
        $staff_name = $row['fullname'];
		$gender = $row['gender'];
		$address = $row['address'];
		$phone = $row['phone'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="./assets/style.css">

	<title>School App</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="./index.php" class="brand">
			<i class='bx bx-user-circle'></i>
			<span class="text">Academic Affair</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="./index.php">
					<i class='bx bx-user-pin' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="./view/student.php">
					<i class='bx bx-user' ></i>
					<span class="text">Student</span>
				</a>
			</li>
			<li>
				<a href="./view/teacher.php">
					<i class='bx bx-user' ></i>
					<span class="text">Teacher</span>
				</a>
			</li>
			<li>
				<a href="./view/timetable.php">
					<i class='bx bx-table' ></i>
					<span class="text">Timetable</span>
				</a>
			</li>
			<li>
				<a href="./view/attendance.php">
					<i class='bx bx-table' ></i>
					<span class="text">Attendance</span>
				</a>
			</li>
			<li>
				<a href="./view/exam.php">
					<i class='bx bx-table' ></i>
					<span class="text">Examination</span>
				</a>
			</li><li>
				<a href="./view/score.php">
					<i class='bx bx-table' ></i>
					<span class="text">Score</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="./Logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
			</a>
			<a href="#" class="profile">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Profile</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Profile</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="./index.php">Home</a>
						</li>
					</ul>
				</div>
				<a href="./add_student.php" class="btn-download">
					<i class='bx bx-add-to-queue' ></i>
					<span class="text">Change Password</span>
				</a>
			</div>

			<div class="table-data">
				<div class="order">
                    <form>
                        <div class="input-box">
							<input type="text" value="Username: <?=$staff_name?>">
						</div>
						<div class="input-box">
							<input type="text" value="Gender: <?=$gender?>">
						</div>
                        <div class="input-box">
							<input type="text" value="Address: <?=$address?>">
						</div>
                        <div class="input-box">
							<input type="text" value="Phone number: <?=$phone?>">
						</div>
					</form>
                </div>
            </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="./assets/script.js"></script>
</body>
</html>