<?php
	
		require("db.php");
		
		@$id 			= $_POST['ot_id'];
		@$overtime		= $_POST['rate'];

		$qry = "UPDATE overtime SET rate='$overtime' WHERE ot_id='1'";
		$sql = mysqli_query($connection, $qry);

		if($sql)
		{
			?>
		        <script>
		            alert('Overtime rate per hour successfully changed...');
		            window.location.href='home_salary.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>