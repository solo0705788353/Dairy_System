<?php
  $conn = mysqli_connect('localhost', 'root', '', 'payroll');
 



  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];
    $password = $_POST['password'];
    $user_type = "user";

    $sql = "INSERT into employee( lname, fname, gender, emp_type, division, user_type,password)VALUES('$lname','$fname','$gender', '$type', '$division', $user_type,$password)";
    $qry = mysqli_query($conn, $sql);

    if($qry)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            //window.location.href='index.php';
        </script>
      <?php 
    }
  }
  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];

    $sql = "INSERT into employee(lname, fname, gender, emp_type, division)VALUES('$lname','$fname','$gender', '$type', '$division')";
    $qry = mysqli_query($conn, $sql);

    if($qry)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            //window.location.href='index.php';
        </script>
      <?php 
    }
  }  if(isset($_POST['submit'])!="")
  {
    $lname      = $_POST['lname'];
    $fname      = $_POST['fname'];
    $gender     = $_POST['gender'];
    $type       = $_POST['emp_type'];
    $division   = $_POST['division'];

    $sql = "INSERT into employee(lname, fname, gender, emp_type, division)VALUES('$lname','$fname','$gender', '$type', '$division')";
    $qry = mysqli_query($conn, $sql);

    if($qry)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            window.location.href='home_employee.php?page=emp_list';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            //window.location.href='index.php';
        </script>
      <?php 
    }
  }




    if(isset($_POST['add-vacc'])!="")
  {
    $vacc_name      = $_POST['vacc_name'];
    $vacc_date      = $_POST['vacc_date'];
    $vacc_time     = $_POST['vacc_time'];
    $vacc_cow       = $_POST['vacc_cow'];
    $vacc_doctor   = $_POST['vacc_doctor'];

    $sql = "INSERT into tbl_vaccination(vacc_name, vacc_date, vacc_time, vacc_cow, vacc_doctor)VALUES('$vacc_name','$vacc_date','$vacc_time', '$vacc_cow', '$vacc_doctor')";
    $qry = mysqli_query($conn, $sql);

    if($qry)
    {
      ?>
        <script>
            alert('Vaccination successfully recorded.');
            window.location.href='diagnose.php';
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            //window.location.href='index.php';
        </script>
      <?php 
    }
  }

?>