<?php
  include("auth.php"); //include auth.php file on all secure pages

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

    <title></title>

    <script>
      <!--
        var ScrollMsg= "Dairy and Poultry"
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
      //  window.setTimeout("StartScrolling()",150); 
        }
        StartScrolling();
      // -->
    </script>

    
    <link href="assets/css/justified-nav.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/daterangepicker.css">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">


  </head>
        <script type="text/javascript">
      function printpage() {
      document.getElementById('printButton').style.visibility="hidden";
      //document.getElementById('namee').style.visibility="hidden";
      window.print();
      document.getElementById('printButton').style.visibility="visible";  
      }
      </script>
  <body>

    <div class="container">

<input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
  
      <div class="well bs-component">
 
    <?php
     $date_picked = $_POST['from'];
     $from_to=explode("-", $date_picked);
     //echo $date_picked;
    $from=new DateTime($from_to[0]);
    $from=$from->format("Y-m-d");
    $to=new DateTime($from_to[1]);
    $to=$to->format("Y-m-d");


    ?>

<p align="center" id="namee"><big><b>Milk Production Report</b></big></p>
          <!--<p align="center"><big><b>Milk records</b></big></p>-->
                  <div class="table-responsive">
                    <form method="post" action="" >
                      <table class="table table-bordered table-hover table-condensed" id="myTable">
                        <!-- <h3><b>Ordinance</b></h3> -->
                        <thead>
                          <tr class="info">
                            <th><p align="center">Date</p></th>
                            <th><p align="center">Milk</p></th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
// where STR_TO_DATE(milk_date,'%Y-%m-%d')>=$from and STR_TO_DATE(milk_date,'%Y-%m-%d')<=$to 
            $conn = mysqli_connect('localhost', 'root', '', 'payroll');
         $data = "select avg(milk_amount) as day_avg,sum(milk_amount) as day_sum, milk_date from tbl_milk
         where STR_TO_DATE(milk_date,'%Y-%m-%d') >= $from 
         group by milk_date ORDER BY DATE(milk_date) asc";
                         $totals=0;
                            $query=mysqli_query($conn, $data);
                            while($row=mysqli_fetch_array($query))
                            {
                              $totals= $totals + $row['day_sum'];
                              /*
                              $id     =$row['milk_id'];
                              $cow_name  =$row['cow_name'];
                              $date  =$row['milk_date'];
                              $time   =$row['milk_time'];
                              $preiod   =$row['period'];
                              $employee   =$row['employee'];
                              $milk_amount   =$row['milk_amount'];
                              */
                          ?>

                          <tr>
                            <td align="center"><?php echo $row['milk_date'] ?></td>
                            <td align="center"><?php echo $row['day_sum'] ?></td>
                          </tr>

                          <?php } ?>
                        </tbody>
                        
                          <tr class="footer">
                            <th><p align="center">Totals: </p></th>
                            <th><p align="center"><?php  echo $totals; ?></p></th>
                          </tr>

                      </table>
                    </form>
                  </div>
    </div>



    </div>


  </body>
</html>