<?php
ob_start();
include '../../includes/conn.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SFAC Alumni Tracker</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  
<?php 
include '../../includes/navbar.php';
require "../../includes/sidebar.php";
?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../pages/admin_home.php">Home</a></li>
              <li class="breadcrumb-item active">Add Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">


          <div class="card card-success"> 
              <!-- card card-primary -->
              <div class="card-header">
                <h3 class="card-title">Basic Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name" required>
                  </div>
                  <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Middle Name">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                </div>

            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->


            <div class="card card-success"> 
              <!-- card card-primary -->
              <div class="card-header">
                <h3 class="card-title">Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="form-group">
                    
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                  </div>
                  <div class="form-group">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-danger float-right">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->



            <?php 
                  if (isset($_POST['update'])) {
                    $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
                    $middlename = mysqli_real_escape_string($db,$_POST['middlename']);
                    $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
                    $email = mysqli_real_escape_string($db,$_POST['email']);
                    $username =mysqli_real_escape_string($db,$_POST['username']);
                    $password = mysqli_real_escape_string($db, $_POST['password']);
                    $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
                    
                    $result=mysqli_query($db,"SELECT * from tbl_admin WHERE firstname='$firstname' ") or die (mysqli_error($db));
                    $row=mysqli_num_rows($result);
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
                    if ($row > 0)
                    {
                    echo "<script>alert('Admin already active!'); window.location='add_admin.php'</script>";
                    }
                    else
                    {       
                        mysqli_query($db,"INSERT into tbl_admin (firstname, middlename, lastname, email, username, password, confirm_password)
                        values ('$firstname', '$middlename', '$lastname', '$email','$username','$hashedPwd', '$confirm_hashedPwd')")or die(mysqli_error($db));
                        echo "<script>alert('Admin successfully added!'); window.location='add_admin.php'</script>";
                    }
                  }
                  ?>

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section><?php
include '../../includes/footer.php';
?>
    <!-- /.content -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->

</body>
</html>
