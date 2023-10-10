<?php 
	require('db.php');
	$conn = mysqli_connect('localhost', 'root', '','payroll');
	
	$id=$_GET['eggs_id'];
	$query = "DELETE FROM tbl_poultry WHERE eggs_id=$id"; 
	$result = mysqli_query($conn, $query);
	echo "<script>alert('Record deleted!');</script>";
	header("Location: poultry_records.php"); 
 ?>