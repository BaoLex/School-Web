<?php
session_start();
include "../db_con.php";
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
		<a href="../index.html" class="brand">
			<i class='bx bx-user-circle'></i>
			<span class="text"><?php echo $_SESSION['username'] ?></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="./student.php">
					<i class='bx bx-user' ></i>
					<span class="text">Student</span>
				</a>
			</li>
			<li>
				<a href="./teacher.php">
					<i class='bx bx-user' ></i>
					<span class="text">Teacher</span>
				</a>
			</li>
			<li>
				<a href="./staff.php">
					<i class='bx bx-user' ></i>
					<span class="text">Staff</span>
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
					<h1>Student</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Student</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../index.php">Home</a>
						</li>
					</ul>
				</div>
                <a href="./add_student.php" class="btn-download">
					<i class='bx bx-add-to-queue' ></i>
					<span class="text">Add New Student</span>
				</a>
			</div>

            <div class="table-data">
				<div class="order">
					<table>
						<thead>
							<tr>
								<th>Section</th>
								<th>Class</th>
								<th>Name</th>
								<th>Gender</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th style="text-align:right">Action</th>
							</tr>
						</thead>
						<?php
							include "../db_con.php";
							$sql="SELECT * from students";
							$result=$conn-> query($sql);
							if ($result-> num_rows > 0){
								while ($row=$result-> fetch_assoc()) {	
						?>
						<tbody>
							<tr>
								<td><p><?=$row["section"]?></p></td>
								<td><p><?=$row["class"]?></p></td>
								<td><p><?=$row["fullname"]?></p></td>
								<td><p><?=$row["gender"]?></p></td>
                                <td><p><?=$row["address"]?></p></td>
                                <td><p><?=$row["phone"]?></p></td>
								<td><span class="status process"><a href="./edit_student.php?id=<?=$row["student_id"]?>">Edit</a></span></td>
								<td><span class="status pending"><a href="../controller/delete_student.php?id=<?=$row["student_id"]?>">Delete</a></span></td>
							</tr>

							<?php
								}
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../assets/script.js"></script>
</body>
</html>