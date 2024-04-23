<?php
session_start(); // Start the session
include '../../includes/scripts.php';
include "../../includes/conn.php";
        if(isset($_POST['btn_login'])) 
        { 
          $user_name = mysqli_real_escape_string($db, $_POST['username']);
          $password = mysqli_real_escape_string($db, $_POST['password']);

            $admin = mysqli_query($db, "SELECT * from tbl_admin where username = '$user_name' ");
            $numrow = mysqli_num_rows($admin);

            

            if($numrow > 0)
            {   
                while($row = mysqli_fetch_array($admin))
                {
                  $hashedPwdCheck = password_verify($password, $row['password']);
                  if ($hashedPwdCheck == false) 
                  {
                    echo "<script>alert('Username or Password do not match!'); window.location='login.php'</script>";
                    exit();
                  } 
                  elseif ($hashedPwdCheck == true) 
                  {
                    $_SESSION['role'] = "Admin";
                    $_SESSION['userid'] = $row['ad_id'];
                  }    
                  echo "<script>alert('Login Successfully!'); window.location='../admin_home.php'</script>";
                }
            }
        //     elseif($numrow1 > 0)
        //       {   
        //         while($row = mysqli_fetch_array($student))
        //         {
        //           $hashedPwdCheck1 = password_verify($password, $row['password']);
        //           if ($hashedPwdCheck1 == false) 
        //           {
        //             echo "<script>alert('Username or Password do not match!'); window.location='login.php'</script>";
        //             exit();
        //           } 
        //           elseif ($hashedPwdCheck1 == true) 
        //           {
        //            $_SESSION['role'] = "Student";
        //            $_SESSION['userid'] = $row['user_id'];
        //           } 
        //           echo "<script>alert('Login Successfully!'); window.location='../students/student_home.php'</script>";
        //         }
        //       }
        //     elseif($numrow2 > 0)
        //       {   
        //         while($row = mysqli_fetch_array($admin))
        //         {
        //           $hashedPwdCheck1 = password_verify($password, $row['admin_password']);
        //           if ($hashedPwdCheck1 == false) 
        //           {
        //             echo "<script>alert('Username or Password do not match!'); window.location='login.php'</script>";
        //             exit();
        //           } 
        //           elseif ($hashedPwdCheck1 == true) 
        //           {
        //            $_SESSION['role'] = "Admin";
        //            $_SESSION['userid'] = $row['admin_id'];
        //           } 
        //           echo "<script>alert('Login Successfully!'); window.location='../admins/admin_home.php'</script>";
        //         }
        //       }
             else
                {
                echo "<script>alert('Invalid Account!'); window.location='login.php'</script>";
                }
             
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SFAC Alumni Tracker</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../../index2.html">SFAC ALUMNI TRACKER</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

      <form method="POST">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input type="checkbox" id="remember"> -->
              <!-- <label for="remember">
                Remember Me
              </label> -->      
              <p class="mb-1">
                <a href="forgot-password.html">forgot my password</a>
              </p>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <br>
            <button type="submit" class="btn btn-primary btn-block" name="btn_login">Sign In</button>

          </div>
          <!-- /.col -->
        </div>
      </form>

      <br>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>
</html>
