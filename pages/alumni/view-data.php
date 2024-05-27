<?php 
ob_start();
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";

if ($_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Registrar")
{
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
  

  <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .feedback-list {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
        }

        .feedback {
            margin-bottom: 20px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #007bff;
            border: 1px solid #007bff;
            margin: 0 5px;
        }

        .pagination .page-item.active .page-link {
            color: white;
            background-color: #007bff;
            border-color: #007bff;
        }

    </style>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../img/logo.png" alt="SFAC" height="400" width="400">
  </div>





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Personal Information</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            


        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">


          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                  <div class="avatar avatar-xl position-relative">
                    <p>First Name</p>
                  <h4 >
                  <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['firstname'];
                echo $row['firstname'];
            }
        }
                } ?>
                  </h4>

                  <br>
                  <br>


                  <p>Gender</p>
                    <h4>
                    <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['lastname'];
                echo $row['firstname']." ". $row['lastname'];
            }
        }
                } ?>
                    </h4>


                    <br>
                  <br>


                    <p>Date of Birth</p>
                    <h4>
                    <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['lastname'];
                echo $row['firstname']." ". $row['lastname'];
            }
        }
                } ?>
                    </h4>


                    <br>
                  <br>


                    <p>Place of Birth</p>
                    <h4>
                    <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['lastname'];
                echo $row['firstname']." ". $row['lastname'];
            }
        }
                } ?>
                    </h4>


                    <br>
                  <br>


                    <p>Civil Status</p>
                    <h4>
                    <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['lastname'];
                echo $row['firstname']." ". $row['lastname'];
            }
        }
                } ?>
                    </h4>





                </div>
              
                  </div>
                  <div class="col-4">
                  <div class="col-sm-auto col-8 my-auto">
                <div class="h-100">
                  <p>Middle Name</p>
                  <h4>
                  <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['middlename'];
                echo $row['middlename'];
            }
        }
                } ?>
                  </h4>
                </div>
              </div>
                  </div>


                  
                  <div class="col-5">
                  <p>Last Name</p>
                  <h4>
                  <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['lastname'];
                echo $row['lastname'];
            }
        }
                } ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Change Profile Picture</h3>
              </div>
              <div class="card-body">
                
              <div class="avatar avatar-xl position-relative">
                </div>
                <div class="col-sm-auto col-8 my-auto">
                <div class="h-100">
                  <h5 class="mb-1 font-weight-bolder">
                  
                  </h5>
                  <p class="mb-0 font-weight-normal text-sm">
                  </p>
                </div>
              </div>
                <!-- <br>
                
                <br>
                <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">


                <br> -->

                
                <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit-admin.php" class="form">

                  <div class="file-upload-wrapper" data-text="Upload Image">
                    <input name="image" type="file" class="file-upload-field" value="">
                    <button type="submit" class="btn bg-gradient-dark btn-sm float-end" name="saveImg">Update Image</button>
                  </div>
                    
                </form>



              </div>
              <!-- /.card-body -->
            </div>
            <!-- general form elements -->
            

            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->



            <div class="card card-danger"> 
              <!-- card card-primary -->
              <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <?php
                      $query=mysqli_query($db,"SELECT * FROM tbl_admin
                       WHERE ad_id='$ad_id'")or die(mysqli_error($db));
                      $row=mysqli_fetch_array($query);
                    ?>
              
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="<?php echo $row['firstname']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <input type="text" name="middlename" class="form-control" id="middlename" placeholder="<?php echo $row['middlename']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="<?php echo $row['lastname']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="<?php echo $row['email']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="<?php echo $row['username']; ?>">
                  </div>
                  <div class="form-group">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="information" class="btn btn-danger float-right">Update Basic Information</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


            <div class="card card-danger"> 
              <!-- card card-primary -->
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    
                    <label for="password">New Passowrd</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-danger float-right">Update Password</button>
                </div>
              </form>
            </div>

            <?php 
    if (isset($_POST['information'])) {
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $username = mysqli_real_escape_string($db, $_POST['username']);

        // Check if at least one of the fields has a value
        if (!empty($firstname) || !empty($middlename) || !empty($lastname) || !empty($email) || !empty($username)) {
            // Build the SQL query based on the provided fields
            $sql = "UPDATE tbl_admin SET";
            if (!empty($firstname)) $sql .= " firstname='$firstname',";
            if (!empty($middlename)) $sql .= " middlename='$middlename',";
            if (!empty($lastname)) $sql .= " lastname='$lastname',";
            if (!empty($email)) $sql .= " email='$email',";
            if (!empty($username)) $sql .= " username='$username',";
            // Remove the trailing comma
            $sql = rtrim($sql, ',');
            // Add the condition for the WHERE clause
            $sql .= " WHERE ad_id = '$ad_id'";
            
            // Execute the SQL query
            mysqli_query($db, $sql) or die(mysqli_error($db));

            echo "<script>alert('Successfully Updated Admin Info!'); window.location='edit_admin.php'</script>";
        } else {
            // Inform the user that at least one field should have a value
            echo "<script>alert('At least one field should have a value.'); window.location='edit_admin.php'</script>";
        }
    }
?>




<?php 
    if (isset($_POST['update'])) {
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
        
        // Check if both password fields are not empty and they match
        if (!empty($password) && !empty($confirm_password) && $password === $confirm_password) {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
            $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);

            // Update the database with the new password
            mysqli_query($db, "UPDATE tbl_admin 
                                SET password='$hashedPwd',confirm_password='$confirm_hashedPwd' 
                                WHERE ad_id = '$ad_id' ")or die(mysqli_error($db));

            echo "<script>alert('Successfully Updated Admin Info!'); window.location='edit_admin.php'</script>";
        } else {
            // Inform the user that passwords do not match or one of the fields is empty
            echo "<script>alert('Passwords do not match or one of the fields is empty.'); window.location='edit_admin.php'</script>";
        }
    }
?>






            <!-- /.card -->
              <!-- /.card-body -->
              </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>




<!-- ==================================== -->



</div>
<!-- ========================================= -->

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->      <?php 
include "../../includes/footer.php";
?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>


<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>




<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
</html>
<?php }else{
    header("Location:index.php");
} ?>