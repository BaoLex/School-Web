<?php
session_start();
include "../db_con.php";
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

	<link rel="stylesheet" href="../assets/style.css">

	<title>School App</title>
</head>
<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../index.php" class="brand">
			<i class='bx bx-user-circle'></i>
			<span class="text">Accountant</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="../index.php">
					<i class='bx bx-user-pin' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li class="active">
				<a href="./fee.php">
					<i class='bx bx-money' ></i>
					<span class="text">Tuition Fee</span>
				</a>
			</li>
			<li>
				<a href="./transaction.php">
					<i class='bx bx-table' ></i>
					<span class="text">Transaction</span>
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
					<h1>Tuition Fee</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Fee</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="../index.php">Home</a>
						</li>
					</ul>
				</div>
				<a href="./add_fee.php" class="btn-download">
					<i class='bx bx-add-to-queue' ></i>
					<span class="text">Add new tuition fee</span>
				</a>
			</div>

			<div class="table-data">
				<div class="order">
					<form action="" method="get">
						<div class="input-box">
							<input type="text" name="search" placeholder="Enter information" required>
						</div>
						<div class="input-box button">
							<input type="Submit" name="submit" value="Search Now">
						</div>
					</form>
				</div>
			</div>
			<?php if (isset($_GET['submit'])){ ?>
            <div class="table-data">
				<div class="order">
					<table>
						<thead>
							<tr>
                                <th>Student Id</th>
								<th>Student Name</th>
                                <th>Class</th>
                                <th>Title</th>
                                <th>Total Fee</th>
								<th>Date</th>
                                <th>Status</th>
							</tr>
						</thead>
						<?php
							include "../db_con.php";
							if (isset($_GET['search'])){
								$search = $_GET['search'];
								$sql="SELECT * from fees where CONCAT(student_id, student_name, class) LIKE '%$search%'";
								$result=$conn-> query($sql);
								if ($result-> num_rows > 0){
									while ($row=$result-> fetch_assoc()) {
						?>
						<tbody>
							<tr>
								<td><p><?=$row['student_id']?></p></td>
                                <td><p><?=$row['student_name']?></p></td>
                                <td><p><?=$row['class']?></p></td>
                                <td><p><?=$row['title']?></p></td>
								<td><p>$<?=$row['fee']?></p></td>
								<td><p><?=$row['date']?></p></td>
								<?php if ($row["status"]=="Unpaid") { ?>
                                    <td><span class="status pending"><?=$row["status"]?></span></td>
                                <?php } elseif ($row["status"]=="Paid") { ?>
                                    <td><span class="status completed"><?=$row["status"]?></span></td>
                                <?php } ?>
							</tr>

							
						</tbody>
						<?php
									}
								}
							}
						?>
					</table>
				</div>
			</div>
			<?php
				}
			?>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="../assets/script.js"></script>
</body>
</html>