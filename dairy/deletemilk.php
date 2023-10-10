<?php 
	require('db.php');
	$conn = mysqli_connect('localhost', 'root', '','payroll');
	
	$id=$_GET['milk_id'];
	$query = "DELETE FROM tbl_milk WHERE milk_id=$id"; 
	$result = mysqli_query($conn, $query);
	echo "<script>alert('Record deleted!')</script>";
	header("Location: milk_records.php"); 
 ?>