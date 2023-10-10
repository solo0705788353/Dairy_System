<?php 

  include("db.php");
  include("auth.php");

  $id         = $_POST['id'];
  $lname      = $_POST['lname'];
  $fname      = $_POST['fname'];
  $gender     = $_POST['gender'];
  $division   = $_POST['division'];
  $emp_type   = $_POST['emp_type'];

  $qry = "UPDATE employee SET emp_type='$emp_type', lname='$lname', fname='$fname', gender='$gender', division='$division' WHERE emp_id='$id'";
  $sql = mysqli_query($connection, $qry);

  if ($sql)
  {
    ?>
    <script>
      alert('Successfully updated.');
      window.location.href='profile.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
?>