<?php 
session_start(); 
include "../db_con.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $today = date('Y-m-d');

    $sql = "SELECT * FROM verify_account WHERE username = '$name' AND password = '$pass'";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
        $sql1 = "UPDATE fees SET status = 'Paid', date = '$today' WHERE fee_id = '$id'";
        $result1 = mysqli_query($conn,$sql1);
        header("Location: ../view/transaction.php");
    } else {
        header("Location: ../view/collect.php");
    }
}