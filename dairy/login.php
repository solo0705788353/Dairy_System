<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Admin Login</title>

  

    
    <link rel="stylesheet" href="assets/css/login.css">

</head>


<body class="hold-transition login-page">
<?php
  require('db.php');
  session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //$username = stripslashes($username);
        //$username = mysqli_real_escape_string($username);

        //$password = stripslashes($password);
        //$password = mysqli_real_escape_string($password);

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $result = mysqli_query($connection, $query );

        while($row=mysqli_fetch_array($result))
                          {
                            $user_type =$row['user_type'];
                          }

        $rows = mysqli_num_rows($result);

        if($rows==1)
        {
          $_SESSION['username'] = $username;
          $_SESSION['user_type'] = $user_type;
          header("Location: index.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid Keyword, please try again.');
            window.location.href='login.php';
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
      <h1>Dairy & Poultry| Admin</h1>
      <div>
        <input name=username type="text" placeholder="Enter Username" required>
        <!-- <input type="text" placeholder="Username" required="" id="username" /> -->
      </div>
      <div>
        <input name=password type="password" placeholder="Enter Password" required>
        <!-- <input type="password" placeholder="Password" required="" id="password" /> -->
      </div>
      <div>
        <input type="submit" value="Log in" />
        
        <a href="emp_login.php">Employee Login</a>
      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->


<?php } ?>


  </body>
</html>