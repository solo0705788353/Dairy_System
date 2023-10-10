<?php 
	require('db.php');
	$conn = mysqli_connect('localhost', 'root', '','payroll');
	
	$id=$_GET['emp_id'];
	$query = "DELETE FROM employee WHERE emp_id=$id"; 
	$result = mysqli_query($conn, $query);
	echo "<script>alert('Employee has been fired!')</script>";
	header("Location: home_employee.php"); 
 ?>