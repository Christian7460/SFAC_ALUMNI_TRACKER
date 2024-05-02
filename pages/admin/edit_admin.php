<?php
ob_start();
include '../../includes/conn.php';



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
include "../../includes/navbar.php";
include "../../includes/sidebar.php";
$ad_id = $_SESSION['ad_id'];
$query=mysqli_query($db,"select * from tbl_admin where ad_id='$ad_id'")or die(mysqli_error($db));
                    $row=mysqli_fetch_array($query);
                    echo $ad_id;

// $_SESSION['ad_id'] = $ad_id;


?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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


          <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Profile</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                  <div class="avatar avatar-xl position-relative">
                  <?php
                  $getUserData = mysqli_query($db, "SELECT * FROM tbl_admin WHERE ad_id = '$ad_id'");
                  while ($row = mysqli_fetch_array($getUserData)) {
                    if (!empty($row['img'])) {
                      echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="bruce"
                                                class="border-radius-lg shadow-sm" style="height: 180px; width: 180px;">';
                    } else {
                      echo '<img src="../../assets/img/image.png" alt="bruce"
                                            class="border-radius-lg shadow-sm">';
                    }
                  }?>
                </div>
              
                  </div>
                  <div class="col-4">
                  <div class="col-sm-auto col-8 my-auto">
                <div class="h-100">
                  <br>
                  <h1 class="mb-1 font-weight-bolder"> &nbsp;
                  <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['lastname'];
                echo $row['firstname']." ". $row['lastname'];
            }
        }
                } ?>
                  </h1>
                  <h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['username'];
                echo $row['username'];
            }
        }
                } ?>
                  </h5>
                </div>
              </div>
                  </div>
                  <div class="col-5">
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
                    <input type="text" name="middlename" class="form-control" id="middlename" placeholder="Middle Name">
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

                        mysqli_query($db, "UPDATE tbl_admin 
                            SET firstname='$firstname', middlename='$middlename', 
                            lastname='$lastname', email='$email', username='$username' 
                            WHERE ad_id = '$ad_id' ")or die(mysqli_error($db));                 

                        echo "<script>alert('Successfully Updated Admin Info!'); window.location='edit_admin.php'</script>";
                    }
            
                ?>



                    <?php 
                             
                             if (isset($_POST['update'])) {
                             $password = mysqli_real_escape_string($db, $_POST['password']);
                             $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
                             $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                             $confirm_hashedPwd = password_hash($confirm_password, PASSWORD_DEFAULT);
         
                             if ($password != $confirm_password) {
                                 if ($_SESSION['role'] == 'Admin') {
                                     echo "<script>alert('Password do not match!'); window.location='edit_admin.php'</script>";
                                 } else {
                                     echo "<script>alert('Password do not match!'); window.location='edit_admin.php'</script>";
                                 }
                             } else {
                                 // Update the database with the new values
                                 mysqli_query($db, "UPDATE tbl_admin 
                                SET password='$hashedPwd',confirm_password='$confirm_hashedPwd' 
                                WHERE ad_id = '$ad_id' ")or die(mysqli_error($db));                 
         
                                 echo "<script>alert('Successfully Updated Admin Info!'); window.location='edit_admin.php'</script>";
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
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
