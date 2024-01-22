<?php
session_start();
include "../db_con.php";

if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
    $sql = "SELECT * FROM teachers WHERE username = '$name'";
    $result=$conn-> query($sql);
    if ($result-> num_rows > 0){
        $row=$result-> fetch_assoc();
        $subject = $row['subject'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<link rel="stylesheet" href="../assets/style.css">

	<title>School App</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../index.php" class="brand">
			<i class='bx bx-user-circle'></i>
			<span class="text"><?php echo $_SESSION['username'] ?></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../index.php">
					<i class='bx bx-user-pin' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="./class.php">
					<i class='bx bx-user' ></i>
					<span class="text">Class</span>
				</a>
			</li>
			<li>
				<a href="./homework.php">
					<i class='bx bx-book' ></i>
					<span class="text">Homework</span>
				</a>
			</li>
			<li class="active">
				<a href="./attendance.php">
					<i class='bx bx-layer' ></i>
					<span class="text">Attendance</span>
				</a>
			</li>
			<li>
				<a href="./score.php">
					<i class='bx bx-table' ></i>
					<span class="text">Score</span>
				</a>
			</li>
			<li>
				<a href="./camera.php">
					<i class='bx bx-camera-movie' ></i>
					<span class="text">Camera Tracking</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="../Logout.php" class="logout">
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
					<h1>Attendance</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Attendance</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../index.php">Home</a>
						</li>
					</ul>
				</div>
			</div>

            <div class="table-data">
				<div class="order">
                        <?php
							include "../db_con.php";
                            if (isset($_GET["class"]) && isset($_GET["name"]) && isset($_GET["subject"])
									&& isset($_GET["shift"])){
                                $class = $_GET["class"];
                                $name = $_GET["name"];
                                $subject = $_GET["subject"];
								$shift = $_GET["shift"];
						?>
					<div class="head">
						<h3>Attendance Form</h3>
					</div>
                    <form action="../controller/check_attendance_controller.php" method="post">
						<div class="input-box">
							<input type="text" name="code" placeholder="Enter class code">
						</div>
						<div class="input-box">
							<input type="text" name="status" placeholder="Enter class status" required>
						</div>
						<div class="input-box button">
							<input type="Submit" name="submit" value="Submit Now">
						</div>
						<input type="hidden" name="class" value="<?=$class?>">
                        <input type="hidden" name="subject" value="<?=$subject?>">
                        <input type="hidden" name="name" value="<?=$name?>">
						<input type="hidden" name="shift" value="<?=$shift?>">
					</form>
                    <?php
                        }
					?>
                </div>
            </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../assets/script.js"></script>
</body>
</html>