<?php 

  include("db.php");
  include("auth.php");
  $conn = mysqli_connect('localhost', 'root', '','payroll');
  $id           = $_POST['id'];
  $deduction    = $_POST['deduction'];
  $overtime     = $_POST['overtime'];
  $bonus        = $_POST['bonus'];

  $qry = "UPDATE employee SET deduction='$deduction', overtime='$overtime', bonus='$bonus' WHERE emp_id='$id'";
  $sql = mysqli_query($conn, $qry);

  if ($sql)
  {
    ?>
    <script>
      alert('Account successfully updated.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    echo "Invalid";
  }
?>