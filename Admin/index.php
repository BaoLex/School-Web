<?php
session_start();
include "./db_con.php";
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
			<span class="text"><?php echo $_SESSION['username'] ?></span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="./index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
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
				<a href="./view/staff.php">
					<i class='bx bx-user' ></i>
					<span class="text">Staff</span>
				</a>
			</li>
			<li>
				<a href="./view/camera.php">
					<i class='bx bx-camera-movie' ></i>
					<span class="text">Camera Tracking</span>
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
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<?php
                            $sql="SELECT * from students";
                            $result=$conn-> query($sql);
                            $count=0;
                            if ($result-> num_rows > 0){
                                while ($row=$result-> fetch_assoc()) {
                         
                                    $count=$count+1;
                                }
                            }
                        ?>
						<h3>Total Student</h3>
						<h2 style="text-align: center"><?php echo $count; ?></h2>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<?php
                            $sql="SELECT * from teachers";
                            $result=$conn-> query($sql);
                            $count=0;
                            if ($result-> num_rows > 0){
                                while ($row=$result-> fetch_assoc()) {
                         
                                    $count=$count+1;
                                }
                            }
                        ?>
						<h3>Total Teacher</h3>
						<h2 style="text-align: center"><?php echo $count; ?></h2>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<?php
                            $sql="SELECT * from accountant";
                            $result=$conn-> query($sql);
							$sql1="SELECT * from academic_staff";
                            $result1=$conn-> query($sql1);
                            $count=0;
                            if ($result-> num_rows > 0){
                                while ($row=$result-> fetch_assoc()) {
                         
                                    $count=$count+1;
                                }
                            }
							if ($result1-> num_rows > 0){
                                while ($row1=$result1-> fetch_assoc()) {
                         
                                    $count=$count+1;
                                }
                            }
                        ?>
						<h3>Total Staff</h3>
						<h2 style="text-align: center"><?php echo $count; ?></h2>
					</span>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<table>
						<thead>
							<tr>
								<th>Student ID</th>
								<th>Student Name</th>
								<th>Class</th>
								<th>Title</th>
								<th>Total Fee</th>
                                <th>Collected Date</th>
                                <th>Collected By</th>
							</tr>
						</thead>
						<?php
							include "../db_con.php";
							$sql="SELECT * from fees WHERE status = 'Paid'";
							$result=$conn-> query($sql);
							$total = 0;
							if ($result-> num_rows > 0){
								while ($row=$result-> fetch_assoc()) {
									$total += $row['fee'];
						?>
						<tbody>
							<tr>
								<td><p><?=$row["student_id"]?></p></td>
								<td><p><?=$row["student_name"]?></p></td>
								<td><p><?=$row["class"]?></p></td>
								<td><p><?=$row["title"]?></p></td>
                                <td><p><?=$row["fee"]?></p></td>
                                <td><p><?=$row["date"]?></p></td>
								<td><p><?=$row["accountant_name"]?></p></td>
							</tr>
						</tbody>
						<?php
								}
							}
						?>
						<div class="head"><h3 style="color:red">Collected amount: $<?php echo $total; ?></h3></div>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="./assets/script.js"></script>
</body>
</html>