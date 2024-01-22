<?php
session_start();
include "../db_con.php";

if(isset($_SESSION['username'])){
    $name = $_SESSION['username'];
    $sql = "SELECT * FROM teachers WHERE username = '$name'";
    $result=$conn-> query($sql);
    if ($result-> num_rows > 0){
        $row=$result-> fetch_assoc();
        $teacher_name = $row['fullname'];
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
			<li class="active">
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
			<li>
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
					<h1>Timetable</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Timetable</a>
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
					<table>
						<thead>
							<tr style="text-align:center">
								<th>SCHEDULE</th>
								<th>MONDAY</th>
								<th>TUESDAY</th>
								<th>WEDNESDAY</th>
								<th>THURSDAY</th>
								<th>FRIDAY</th>
								<th>SATURDAY</th>
								<th>SUNDAY</th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<?php
									include "../db_con.php";
									if (isset($_GET["class"])){
										$class = $_GET["class"];
										$sql="SELECT * from timetable where class = '$class' and shift = 1";
										$result=$conn-> query($sql);
										if ($result-> num_rows > 0){
											while ($row=$result-> fetch_assoc()) {
												if($row['monday'] == $subject){
													$monday = $subject;
												} elseif ($row['monday'] != $subject){
													$monday = null;
												}
												if($row['tuesday'] == $subject){
													$tuesday = $subject;
												} elseif ($row['tuesday'] != $subject){
													$tuesday = null;
												}
												if($row['wednesday'] == $subject){
													$wednesday = $subject;
												} elseif ($row['wednesday'] != $subject){
													$wednesday = null;
												}
												if($row['friday'] == $subject){
													$friday = $subject;
												} elseif ($row['friday'] != $subject){
													$friday = null;
												}
												if($row['thursday'] == $subject){
													$thursday = $subject;
												} elseif ($row['thursday'] != $subject){
													$thursday = null;
												}
												if($row['saturday'] == $subject){
													$saturday = $subject;
												} elseif ($row['saturday'] != $subject){
													$saturday = null;
												}
								?>
								<td><p>SHIFT 1</p></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=1"><p><?=$monday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=1"><p><?=$tuesday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=1"><p><?=$wednesday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=1"><p><?=$thursday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=1"><p><?=$friday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=1"><p><?=$saturday?></p></a></td>
								<td><p></p></td>
								<?php
										}
									}
								}
								?>
							</tr>
							
							<tr>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><h4 style="color:red; text-align:center">BREAK TIME</></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
							</tr>
							<tr>
								<?php
									include "../db_con.php";
									if (isset($_GET["class"])){
										$class = $_GET["class"];
										$sql="SELECT * from timetable where class = '$class' and shift = 2";
										$result=$conn-> query($sql);
										if ($result-> num_rows > 0){
											while ($row=$result-> fetch_assoc()) {
												if($row['monday'] == $subject){
													$monday = $subject;
												} elseif ($row['monday'] != $subject){
													$monday = null;
												}
												if($row['tuesday'] == $subject){
													$tuesday = $subject;
												} elseif ($row['tuesday'] != $subject){
													$tuesday = null;
												}
												if($row['wednesday'] == $subject){
													$wednesday = $subject;
												} elseif ($row['wednesday'] != $subject){
													$wednesday = null;
												}
												if($row['friday'] == $subject){
													$friday = $subject;
												} elseif ($row['friday'] != $subject){
													$friday = null;
												}
												if($row['thursday'] == $subject){
													$thursday = $subject;
												} elseif ($row['thursday'] != $subject){
													$thursday = null;
												}
												if($row['saturday'] == $subject){
													$saturday = $subject;
												} elseif ($row['saturday'] != $subject){
													$saturday = null;
												}
								?>
								<td><p>SHIFT 2</p></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=2"><p><?=$monday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=2"><p><?=$tuesday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=2"><p><?=$wednesday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=2"><p><?=$thursday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=2"><p><?=$friday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=2"><p><?=$saturday?></p></a></td>
								<td><p></p></td>
								<?php
										}
									}
								}
								?>
							</tr>
							<tr>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><h4 style="color:red; text-align:center">LUNCH TIME</h4></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
							</tr>
							<tr>
								<?php
									include "../db_con.php";
									if (isset($_GET["class"])){
										$class = $_GET["class"];
										$sql="SELECT * from timetable where class = '$class' and shift = 3";
										$result=$conn-> query($sql);
										if ($result-> num_rows > 0){
											while ($row=$result-> fetch_assoc()) {
												if($row['monday'] == $subject){
													$monday = $subject;
												} elseif ($row['monday'] != $subject){
													$monday = null;
												}
												if($row['tuesday'] == $subject){
													$tuesday = $subject;
												} elseif ($row['tuesday'] != $subject){
													$tuesday = null;
												}
												if($row['wednesday'] == $subject){
													$wednesday = $subject;
												} elseif ($row['wednesday'] != $subject){
													$wednesday = null;
												}
												if($row['friday'] == $subject){
													$friday = $subject;
												} elseif ($row['friday'] != $subject){
													$friday = null;
												}
												if($row['thursday'] == $subject){
													$thursday = $subject;
												} elseif ($row['thursday'] != $subject){
													$thursday = null;
												}
												if($row['saturday'] == $subject){
													$saturday = $subject;
												} elseif ($row['saturday'] != $subject){
													$saturday = null;
												}
								?>
								<td><p>SHIFT 3</p></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=3"><p><?=$monday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=3"><p><?=$tuesday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=3"><p><?=$wednesday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=3"><p><?=$thursday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=3"><p><?=$friday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=3"><p><?=$saturday?></p></a></td>
								<td><p></p></td>
								<?php
										}
									}
								}
								?>
							</tr>
							<tr>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><h4 style="color:red; text-align:center">BREAK TIME</h4></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
								<td><p></p></td>
							</tr>
							<tr>
								<?php
									include "../db_con.php";
									if (isset($_GET["class"])){
										$class = $_GET["class"];
										$sql="SELECT * from timetable where class = '$class' and shift = 4";
										$result=$conn-> query($sql);
										if ($result-> num_rows > 0){
											while ($row=$result-> fetch_assoc()) {
												if($row['monday'] == $subject){
													$monday = $subject;
												} elseif ($row['monday'] != $subject){
													$monday = null;
												}
												if($row['tuesday'] == $subject){
													$tuesday = $subject;
												} elseif ($row['tuesday'] != $subject){
													$tuesday = null;
												}
												if($row['wednesday'] == $subject){
													$wednesday = $subject;
												} elseif ($row['wednesday'] != $subject){
													$wednesday = null;
												}
												if($row['friday'] == $subject){
													$friday = $subject;
												} elseif ($row['friday'] != $subject){
													$friday = null;
												}
												if($row['thursday'] == $subject){
													$thursday = $subject;
												} elseif ($row['thursday'] != $subject){
													$thursday = null;
												}
												if($row['saturday'] == $subject){
													$saturday = $subject;
												} elseif ($row['saturday'] != $subject){
													$saturday = null;
												}
								?>
								<td><p>SHIFT 4</p></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=4"><p><?=$monday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=4"><p><?=$tuesday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=4"><p><?=$wednesday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=4"><p><?=$thursday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=4"><p><?=$friday?></p></a></td>
								<td><a href="./check_attendance.php?class=<?=$row['class']?>&subject=<?=$subject?>&name=<?=$teacher_name?>&shift=4"><p><?=$saturday?></p></a></td>
								<td><p></p></td>
								<?php
										}
									}
								}
								?>
							</tr>
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