<?php
  $conn = mysqli_connect('localhost', 'root', '', 'payroll');
 



  if(isset($_POST['submit'])!="")
  {
    $cow_name   = $_POST['cow_name'];
    $date1       = $_POST['milk_date'];
    $time1       = $_POST['milk_time'];
    $period     = $_POST['period'];
    $employee   = $_POST['employee'];
    $milk_amount   = $_POST['amount'];

    $sql = "INSERT into tbl_milk(cow_name, milk_date, milk_time, period, employee, milk_amount)VALUES('$cow_name','$date1',' $time1', '$period', '$employee', '$milk_amount')";
    $qry = mysqli_query($conn, $sql);

    if($qry)
    {
      ?>
        <script>
            alert('Milk record had been successfully added.');
            window.location.href='milk_records.php';
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