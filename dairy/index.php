<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");
  include("update_acc.php");

if($_SESSION['user_type']!='admin')
{
    header("location: profile.php");
}
?>

<?php

  $conn = mysqli_connect('localhost', 'root', '','payroll');

  $qry = "select * from deductions";
  $query  = mysqli_query($conn, $qry);
  while($row=mysqli_fetch_array($query))
  {
    $id           = $row['deduction_id'];
    $philhealth   = $row['philhealth'];
    $bir          = $row['bir'];
    $gsis         = $row['gsis'];
    $love         = $row['pag_ibig'];
    $loans        = $row['loans'];

    $total        = $philhealth + $bir + $gsis + $love + $loans;
  }
?>


<!DOCTYPE html>

<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title></title>

    <script>
      <!--
        var ScrollMsg= "Dairy and Poultry - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b>Dairy & Poultry System</b>
            <a data-toggle="modal" href="#colins" class="pull-right" style="text-decoration: none;">Logged in as: <b><?php echo $_SESSION['username']; 
              ?></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
          <?php
          $user_type = $_SESSION['user_type'];
            if($user_type == 'admin'){
            echo "<li class='active'><a href='index.php'>Dashboard</a></li>
            <li><a href='milk_records.php'>Milk Records</a></li>
            <li><a href='poultry_records.php'>Poultry Records</a></li>
            <li><a href='home_employee.php'>Employee</a></li> 
            <li><a href='home_salary.php'>Income</a></li>
            <li><a href='diagnose.php'>Treatment</a></li>
            <li><a href='reports.php'>Reports</a></li>"; 
            } else {
            echo "<li class='active'><a href='profile.php'>Dashboard</a></li>
            <li><a href='milk_records.php'>Milk Records</a></li>
            <li><a href='poultry_records.php'>Poultry Records</a></li>
            <li><a href='diagnose.php'>Treatment</a></li>
            ";
            }

            ?>
          </ul>
        </nav>
      </div><br>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h2>Dairy & Poultry Management system</h2>
        <p class="lead">Services
        <ul class="list-group">
          <li class="list-group-item">Milk Records</li>
          <li class="list-group-item">Poultry Records</li>
          <li class="list-group-item">Payroll</li>
          <li class="list-group-item">Animal Diagnosis</li>
          <li class="list-group-item">Income profits</li>
        </ul>
        </p>
        <p><a data-toggle="modal" class="btn btn-lg btn-success" href="#instructor" role="button">Submitted to:</a></p>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p align="center">&copy; All Rights Reserved 2017</p>
        <p align="center">Copyright by <a target="_blank" href="#" data-show-count="true">School Project</a></p>
        <p align="center">About the <a target="_blank" href="#">Developer</a></p>
      </footer>

      <!-- this modal is for my INSTRUCTOR -->
      <div class="modal fade" id="instructor" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Supervisor</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
              <!-- Insert the name of your supervior here-->
                <a href="#" target="_blank" title="My Project Supervisor"><big><b>Lecturer name</b></big></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>
