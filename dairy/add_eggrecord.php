<?php
  $conn = mysqli_connect('localhost', 'root', '', 'payroll');
 



  if(isset($_POST['submit'])!="")
  {
    
    $date1       = $_POST['egg_date'];
    $time1       = $_POST['egg_time'];
    $period     = $_POST['period'];
    $employee   = $_POST['employee'];
    $egg_amount   = $_POST['egg_number'];

    $sql = "INSERT into tbl_poultry( egg_date, egg_time, period, employee, egg_number)VALUES('$date1',' $time1', '$period', '$employee', '$egg_amount')";
    $qry = mysqli_query($conn, $sql);

    if($qry)
    {
      ?>
        <script>
            alert('Egg record had been successfully added.');
            window.location.href='poultry_records.php';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            window.location.href='index.php';
        </script>
      <?php 
    }
  }
?>