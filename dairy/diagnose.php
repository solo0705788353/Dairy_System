<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");
  include("update_acc.php");
  $qry = "SELECT * from deductions WHERE deduction_id='1'";
  $sql = mysqli_query($conn, $qry);
  while($row = mysqli_fetch_array($sql))
  {
    $phil = $row['philhealth'];
    $bir = $row['bir'];
    $gsis = $row['gsis'];
    $love = $row['pag_ibig'];
    $loans = $row['loans'];
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
            echo "<li ><a href='index.php'>Dashboard</a></li>
            <li><a href='milk_records.php'>Milk Records</a></li>
            <li><a href='poultry_records.php'>Poultry Records</a></li>
            <li><a href='home_employee.php'>Employee</a></li> 
            <li><a href='home_salary.php'>Income</a></li>
            <li class='active'><a href='diagnose.php'>Treatment</a></li>
            <li><a href='reports.php'>Reports</a></li>"; 
            } else {
            echo "<li ><a href='profile.php'>Profile</a></li>
            <li ><a href='milk_records.php'>Milk Records</a></li>
            <li ><a href='poultry_records.php'>Poultry Records</a></li>
            <li class='active'><a href='diagnose.php'>Treatment</a></li>
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
                <button type="button" data-toggle="modal" data-target="#addVaccinaton" class="btn btn-success">Add Vaccination</button>
                <button type="button" data-toggle="modal" data-target="#addTreatment" class="btn btn-warning">Diagnose a Cow</button>
                <p align="center"><big><b>Vaccination Records</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Vaccination ID</p></th>
                          <th><p align="center">Vaccine Name</p></th>
                          <th><p align="center">Date Administered</p></th>
                          <th><p align="center">Time Administered</p></th>
                          <th><p align="center">Cow Name/ Poultry</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                          $conn = mysqli_connect('localhost', 'root', '', 'payroll');
                          $data = "select * from tbl_vaccination ORDER BY vacc_id asc";
                          $query=mysqli_query($conn, $data);
                          while($row=mysqli_fetch_array($query))
                          {
                            $id     =$row['vacc_id'];
                            $name  =$row['vacc_name'];
                            $vacc_date  =$row['vacc_date'];
                            $vacc_time   =$row['vacc_time'];
                            $vacc_cow   =$row['vacc_cow'];

                        ?>

                        <tr>
                          <td align="center"><a href="#">VA<?php echo $row['vacc_id']; ?>RX</a></td>
                          <td align="center"><a href="#" title="Update"><?php echo $row['vacc_name']; ?></a></td>
                          <td align="center"><a href="#" title="Update"><?php echo $row['vacc_date']; ?></a></td>
                          <td align="center"><a href="#" title="Update"><?php echo $row['vacc_time']; ?></a></td>
                          <td align="center"><a href="#" title="Update"><?php echo $row['vacc_cow'] ?></a></td>
                          <td>
                          <?php
                          $user_type = $_SESSION['user_type'];
                          if($user_type == 'admin'){
                            echo "<a class='btn btn-primary' href='#'>View</a>
                            <a class='btn btn-danger' href='deletevacc.php?vacc_id=$id'>Delete</a>";
                          } else {
                            echo "Must Be admin!";
                          }
                          ?>
                         </td>
                          
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        <tr class="info">
                          <th><p align="center">Vaccination ID</p></th>
                          <th><p align="center">Vaccine Name</p></th>
                          <th><p align="center">Date Administered</p></th>
                          <th><p align="center">Time Administered</p></th>
                          <th><p align="center">Cow Name/ Poultry</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for diagonising -->
      <div class="modal fade" id="addTreatment" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Diagonise</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
              <p>Select symptoms from the list:</p>
                <div class="radio">
                <label>
                  <input type="radio" value="swollen-udder" name="dis">Swollen udder
                </label>
                <br>
                <label>
                  <input type="radio" value="lack-of-appetite" name="dis">Lack of appetite
                </label>
                <br>
                <label>
                  <input type="radio" value="sunken-eyes" name="dis">sunken eyes
                </label>
                <br>
                <label>
                  <input type="radio" value="watery-milk" name="dis">Watery Milk
                </label>
                 <br>
                <label>
                  <input type="radio" value="bloody-diarrhea" name="dis">Bloody diarrhea
                </label>
                 <br>
                <label>
                  <input type="radio" value="high-temperature" name="dis">High temperature
                </label>
                 <br>
                <label>
                  <input type="radio" value="mouth-sores" name="dis">Mouth sores
                </label>
                </div>
                <?php
                if(isset($_POST['treat'])){
                $search = $_POST['dis'];
                $qry = "select * from tbl_disease where dis_symptoms like '%$search%'";
                
                $run_search = mysqli_query($conn, $qry);
                $count_search = mysqli_num_rows($run_search);

                if ($count_search==0){
                      echo "No such disease";
                   }
                
                while($row_search=mysqli_fetch_array($run_search)){
                  $dis_name = $row_search['dis_name'];
                  echo "<h3>
                          <script>
                          alert('You cow might be having:$dis_name.');
                           
                          </script>


                  ";
                }
                }

                ?>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="treat" class="btn btn-success" value="Treat">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Selection">
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

            <!-- this modal is for adding vaccination -->
      <div class="modal fade" id="addVaccinaton" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Vaccination</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

 <form class="form-horizontal" action="#" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Vaccination Name:</label>
                  <div class="col-sm-8">
                    <input type="text" name="vacc_name" class="form-control" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Cow Name / Poultry:</label>
                  <div class="col-sm-8">
                    <select name="vacc_cow" class="form-control" placeholder="Cow Name" required>
                      <option value="">Select Poultry or cow name</option>
                      <option value="Poultry">Poultry</option>
                      <?php
                      $conn = mysqli_connect('localhost', 'root', '', 'payroll');
                      $data1 = "SELECT * FROM tbl_cows"; 
                      $qrycow = mysqli_query($conn, $data1);
                      while($rowcow = mysqli_fetch_array($qrycow)){
                        $cow_id = $rowcow ['cow_id'];
                        $cow_name = $rowcow ['cow_name'];
                        $cow_breed = $rowcow ['cow_breed'];
                      ?>
                      <option value="<?php echo $rowcow['cow_name'] ?>"><?php echo $rowcow['cow_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Date:</label>
                  <div class="col-sm-8">
                    <input type="text" name="vacc_date" class="form-control" value="<?php echo date("Y-m-d");?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Time:</label>
                  <div class="col-sm-8">
                    <input type="text" name="vacc_time" class="form-control" value="<?php echo date("h:i:s");?>"  required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Administered by: </label>
                  <div class="col-sm-8">
                    <select name="vacc_doctor" class="form-control" placeholder="" required>
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
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="add-vacc" class="btn btn-success" value="Submit">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
                </div>
              </form>


            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my -->
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