<?php
require '../../includes/conn.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

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
                    <input type="text" class="form-control" name="firstname" required="required" id="firstname" placeholder="First Name">
                  </div>
                  <div class="form-group">
                    <label for="middlename">Middle Name</label>
                    <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name">
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required="required" id="lastname" placeholder="Last Name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" autocomplete="off" name="email" id="email" placeholder="e.g. sample@email.com" class="form-control">
                  </div>

                  
                </div>
                <!-- /.card-body -->


              </form>
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
                <h3 class="card-title">Account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form>
                <div class="card-body">
                <div class="form-group">
                    
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="required">

                  </div>
                  <div class="form-group">
                    
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">

                  </div>
                  <div class="form-group">
                    <label for="confirm_pass">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="Confirm Password" required="required">
                  </div>
                  <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-success float-right">Submit</button>
                  </div>
                  
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->

            <?php 
                  if (isset($_POST['submit'])) {

                        $firstname = mysqli_real_escape_string($db,$_POST['firstname']);
                        $middlename = mysqli_real_escape_string($db,$_POST['middlename']);
                        $lastname = mysqli_real_escape_string($db,$_POST['lastname']);
                        $email = mysqli_real_escape_string($db,$_POST['email']);
                        $username =mysqli_real_escape_string($db,$_POST['username']);
                        $password = mysqli_real_escape_string($db,$_POST['password']);
                        $confirm_password = mysqli_real_escape_string($db,$_POST['confirm_password']);                        
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
                    
                    
                        if($password != $confirm_password){
                          echo "<script>alert('Password do not match!'); window.location='add_admin.php'</script>";

                        }else{
                          mysqli_query($db,"INSERT into tbl_admin (firstname, middlename, lastname, email, username, password, confirm_password)
                          values ('$firstname', '$middlename', '$lastname', '$email','$username','$hashedPwd', '$confirm_hashedPwd' )")or die(mysqli_error($db));
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
