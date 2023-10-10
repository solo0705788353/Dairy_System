<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Employee Login</title>

  

    
    <link rel="stylesheet" href="assets/css/login.css">

</head>


<body class="hold-transition login-page">
<?php
  require('db.php');
   include("update_acc.php");
  session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];


        //Checking is user existing in the database or not
        $query = "SELECT * FROM `employee` WHERE lname='$username' and password='$password'";
        $result = mysqli_query($connection, $query );

                          while($row=mysqli_fetch_array($result))
                          {
                            $id = $row['emp_id'];
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $gender = $row['gender'];
                            $user_type =$row['user_type'];
                            $deduction = $row['deduction'];
                            $overtime = $row['overtime'];
                            $emp_type = $row['emp_type'];
                          }



        $rows = mysqli_num_rows($result);

        if($rows==1)
        {
          $_SESSION['username'] = $username;

          $_SESSION['id'] = $id;
          $_SESSION['fname'] = $fname;
          $_SESSION['lname'] = $lname;
          $_SESSION['gender'] = $gender;
          $_SESSION['deduction'] = $deduction;
          $_SESSION['overtime'] = $overtime;
          $_SESSION['emp_type'] = $emp_type;

          $_SESSION['user_type'] = $user_type;
          header("Location: profile.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid Keyword, please try again.');
            window.location.href='emp_login.php';
          </script>
          <?php
        }
    }
    else
    {
?>


<br><br><br><br><br><br><br><br>
<div class="container">
  <section id="content">
    <form action="" method="post">
      <h1>Dairy & Poultry| Employee</h1>
      <div>
        <input name=username type="text" placeholder="Enter Lastname" required>
        <!-- <input type="text" placeholder="Username" required="" id="username" /> -->
      </div>
      <div>
        <input name=password type="password" placeholder="Enter Password" required>
        <!-- <input type="password" placeholder="Password" required="" id="password" /> -->
      </div>
      <div>
        <input type="submit" value="Log in" />
        
        <a href="login.php">Admin Login</a>
      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->


<?php } ?>


  </body>
</html>