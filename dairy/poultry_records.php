<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_eggrecord.php");
  include("update_acc.php");

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

    <title>poultry records</title>

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
            echo "<li ><a href='index.php'>Dashboard</a></li>
            <li><a href='milk_records.php'>Milk Records</a></li>
            <li class='active'><a href='poultry_records.php'>Poultry Records</a></li>
            <li><a href='home_employee.php'>Employee</a></li> 
            <li><a href='home_salary.php'>Income</a></li>
            <li><a href='diagnose.php'>Treatment</a></li>
            <li><a href='reports.php'>Reports</a></li>"; 
            } else {
            echo "<li ><a href='profile.php'>Profile</a></li>
            <li ><a href='milk_records.php'>Milk Records</a></li>
            <li class='active'><a href='poultry_records.php'>Poultry Records</a></li>
            <li><a href='diagnose.php'>Treatment</a></li>
            ";
            }

            ?>
          </ul>

        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-success">Add New</button>
                <p align="center"><big><b>Egg colletion records</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">S. No</p></th>
                          <th><p align="center">Date</p></th>
                          <th><p align="center">Time</p></th>
                          <th><p align="center">Period</p></th>
                          <th><p align="center">Collected By</p></th>
                          <th><p align="center">Number of eggs</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $conn = mysqli_connect('localhost', 'root', '', 'payroll');
                          $data = "select * from tbl_poultry ORDER BY eggs_id asc";
                          $query=mysqli_query($conn, $data);
                          while($row=mysqli_fetch_array($query))
                          {
                            $id     =$row['eggs_id'];
                            $date  =$row['egg_date'];
                            $time   =$row['egg_time'];
                            $preiod   =$row['period'];
                            $employee   =$row['employee'];
                            $egg_number   =$row['egg_number'];
                        ?>

                        <tr>
                          <td align="center"><a href="#" title="Update">E<?php echo $row['eggs_id']; ?>QG</a></td>
                          
                          <td align="center"><a href="#" title="Update"><?php echo $row['egg_date'] ?></a></td>
                          <td align="center"><a href="#" title="Update"><?php echo $row['egg_time'] ?></a></td>
                          <td align="center"><a href="#" title="Update"><?php echo $row['period'] ?></a></td>
                          <td align="center"><a href="#" title="Update"><?php echo $row['employee'] ?></a></td>
                          <td align="center"><a href="#" title="Update"><?php echo $row['egg_number'] ?></a></td>
                          <td>
                          <?php
                          $user_type = $_SESSION['user_type'];
                          if($user_type == 'admin'){
                            echo "<a class='btn btn-primary' href='#'>View</a>
                            <a class='btn btn-danger' href='delete_egg.php?eggs_id=$id'>Delete</a>";
                          } else {
                            echo "Must Be admin!";
                          }
                          ?>
                         </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        <tr class="info">
                          <th><p align="center">S. No</p></th>
                          <th><p align="center">Date</p></th>
                          <th><p align="center">Time</p></th>
                          <th><p align="center">Period</p></th>
                          <th><p align="center">Collected By</p></th>
                          <th><p align="center">Number of eggs</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Egg Collection Record</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
     
                <div class="form-group">
                  <label class="col-sm-4 control-label">Date:</label>
                  <div class="col-sm-8">
                    <input type="text" name="egg_date" class="form-control" value="<?php echo date("Y-m-d");?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Time:</label>
                  <div class="col-sm-8">
                    <input type="text" name="egg_time" class="form-control" value="<?php echo date("h:i:s");?>"  required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Period:</label>
                  <div class="col-sm-8">
                    <select name="period" class="form-control" placeholder="" required>
                      <option value="">Select period</option>
                      <option value="morning">Morning</option>
                      <option value="afternoon">Afternoon</option>
                      <option value="evening">Evening</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Collected by: </label>
                  <div class="col-sm-8">
                    <select name="employee" class="form-control" placeholder="" required>
                      <option value="">Select employee</option>
                      <?php
                      $conn = mysqli_connect('localhost', 'root', '', 'payroll');
                      $data1 = "SELECT * FROM employee"; 
                      $qryempl = mysqli_query($conn, $data1);
                      while($rowcow = mysqli_fetch_array($qryempl)){
                        $fname = $rowcow ['fname'];

                      ?>
                      <option value="<?php echo $rowcow['fname'] ?>"><?php echo $rowcow['fname'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Number of eggs:</label>
                  <div class="col-sm-8">
                    <input type="number" step="any" name="egg_number" class="form-control" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
                </div>
              </form>

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