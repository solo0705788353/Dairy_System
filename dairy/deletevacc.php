<?php 
	require('db.php');
	$conn = mysqli_connect('localhost', 'root', '','payroll');
	
	$id=$_GET['vacc_id'];
	$query = "DELETE FROM tbl_vaccination WHERE vacc_id=$id"; 
	$result = mysqli_query($conn, $query);
	echo "<script>alert('Record deleted!')</script>";
	header("Location: diagnose.php"); 
 ?>