<?php 
ob_start();
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";


$form_id = $_GET['formID'];

$query = $db->query("SELECT * FROM tbl_form 
LEFT JOIN tbl_gender ON tbl_gender.gender_id = tbl_form.gender_id 
LEFT JOIN tbl_campus ON tbl_campus.campus_id = tbl_form.campus_id 
LEFT JOIN tbl_civil_status ON tbl_civil_status.civil_id = tbl_form.civil_id
LEFT JOIN tbl_program ON tbl_program.program_id = tbl_form.program_id
LEFT JOIN tbl_batch ON tbl_batch.batch_id = tbl_form.batch_id
LEFT JOIN tbl_attainment ON tbl_attainment.attain_id = tbl_form.attain_id
LEFT JOIN tbl_employment_status ON tbl_employment_status.emp_status_id = tbl_form.emp_status_id
LEFT JOIN tbl_primary_work_loc ON tbl_primary_work_loc.loc_id = tbl_form.loc_id
LEFT JOIN tbl_type_org ON tbl_type_org.type_id = tbl_form.type_id
LEFT JOIN tbl_length_employment ON tbl_length_employment.length_id = tbl_form.length_id
LEFT JOIN tbl_align ON tbl_align.align_id = tbl_form.align_id
LEFT JOIN tbl_satisfy ON tbl_satisfy.sat_id = tbl_form.sat_id
LEFT JOIN tbl_collaborate ON tbl_collaborate.collab_id = tbl_form.collab_id
WHERE form_id = '$form_id'");

$row_alum = mysqli_fetch_array($query);

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
        <div class="row">
          <!-- left column -->


          
          
          <div class="col-md-6">
          <div class="card card-danger"> 
              <!-- card card-primary -->
              <div class="card-header">
                <h3 class="card-title">Personal Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                
                  <div class="form-group">
                    <span>Firstname</span>
                  <input type="text" required require id="user_name" class="form-control" name="firstname" value="<?php echo $row_alum['firstname']; ?>" >
                        
                  </div>
                  <div class="form-group">
                    <span>Middlename</span>
                  <input type="text" required require name="middlename" class="form-control" value="<?php echo $row_alum['middlename']; ?>" >
                        
                  </div>
                  <div  class="form-group">
                    <span>Lastname</span>
                  <input type="text" required require name="lastname" class="form-control" value="<?php echo $row_alum['lastname']; ?>" >
                        
                </div>
                  <div class="form-group">
                    <span>Gender</span>
                  <input type="text" required require name="email" class="form-control" value="<?php echo $row_alum['gender']; ?>">
                        
                </div>
                  <div class="form-group">
                    <span>Campus</span>
                  <input type="text" required require name="email" class="form-control" value="<?php echo $row_alum['campus']; ?>">
                        
                  </div>
                  <div class="form-group">
                    <span>Civil Status</span>
                  <input type="text" required require name="email" class="form-control" value="<?php echo $row_alum['civil']; ?>">
                        
                  </div>
                  <div class="form-group">
                    <span>E-mail Address</span>
                  <input type="text" required require name="email" class="form-control" value="<?php echo $row_alum['email']; ?>">
                        
                  </div>
                  <div class="form-group">
                    <span>Present Address</span>
                  <input type="text" required require name="pres_address" class="form-control" value="<?php echo $row_alum['address']; ?>">
                        
                  </div>
                  <div class="form-group">
                    <span>Date of Birth (mm/dd/yyyy)</span>
                  <input type="text" required require name="date_birth" class="form-control" value="<?php echo $row_alum['date_birth']; ?>" >
                        
                  </div>
                  <div class="form-group">
                    <span>Birth Place</span>
                  <input type="text" required require name="birth_place" class="form-control" value="<?php echo $row_alum['birth_place']; ?>">
                        
                  </div>
                  <div class="form-group">
                    <span>Contact No</span>
                  <input type="text" required require name="contact" class="form-control" value="<?php echo $row_alum['contact']; ?>">
                        
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="information" class="btn btn-danger float-right">Update Basic Information</button>
                </div>
              </form>
            </div>


          <div class="card card-danger"> 
              <!-- card card-primary -->
              <div class="card-header">
                <h3 class="card-title">Employment Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                
                <h6>In case of self-employment, please answer the following:</h6>
                  <br>
                  <div class="form-group"><span>Name of Business</span>
                  <input type="text" placeholder="Name of Business" name="buss_name" class="form-control" value="<?php echo $row_alum['buss_name']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Nature of Business</span>
                  <input type="text" placeholder="Nature of Business" id="user_name" name="nat_name" class="form-control" value="<?php echo $row_alum['nat_name']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Role in the Business</span>
                  <input type="text" placeholder="Role in the Business" name="role_name" class="form-control" value="<?php echo $row_alum['role_name']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Approximate Monthly Profit</span>
                  <input type="text" placeholder="Approximate Monthly Profit" id="user_name" name="profit" class="form-control" value="<?php echo $row_alum['profit']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Business Address</span>
                  <input type="text" placeholder="Business Address" name="buss_address" class="form-control" value="<?php echo $row_alum['buss_addr']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Business Phone Numbers</span>
                  <input type="text" placeholder="Business Phone Numbers" id="user_name" name="buss_no" class="form-control" value="<?php echo $row_alum['buss_no']; ?>">
                        
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="information" class="btn btn-danger float-right">Update Basic Information</button>
                </div>
              </form>
            </div>

          </div>



          <!--/.col (left) -->
          <!-- right column -->
          
          <div class="col-md-6">
            <!-- Form Element sizes -->



            <div class="card card-danger"> 
              <!-- card card-primary -->
              <div class="card-header">
                <h3 class="card-title">Educational Background</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                  <div class="form-group"><span>Bachelor's Degree in SFAC</span>
                  <input type="text" placeholder="Bachelor's Degree in SFAC"  name="attain_field" class="form-control" value="<?php echo $row_alum['program']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Year Graduated</span>
                  <input type="text" placeholder="Year Graduated"  name="attain_where" class="form-control" value="<?php echo $row_alum['batch']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Latest Attainment</span>
                  <input type="text" placeholder="Latest Attainment"  name="attain_field" class="form-control" value="<?php echo $row_alum['attainment']; ?>">
                        
                  </div>
                  <div class="form-group"><span>What specific field?</span>
                  <input type="text" placeholder="What specific field?"  name="attain_field" class="form-control" value="<?php echo $row_alum['attain_field']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Name of School</span>
                  <input type="text" placeholder="Name of School"  name="attain_where" class="form-control" value="<?php echo $row_alum['attain_where']; ?>">
                        
                  </div>
                  <div class="form-group">
                  <h4>Achievements & Rewards</h4>
                  </div>
                  <div class="form-group">
                  <input type="text" placeholder="Please type in here ..." name="achieve_rewards1" class="form-control" value="<?php echo $row_alum['achieve_rewards1']; ?>">

                  </div>
                  <div class="form-group">
                  <input type="text" placeholder="Please type in here ..." name="achieve_rewards2" class="form-control" value="<?php echo $row_alum['achieve_rewards2']; ?>">

                  </div>
                  <div class="form-group">
                  <input type="text" placeholder="Please type in here ..." name="achieve_rewards3" class="form-control" value="<?php echo $row_alum['achieve_rewards3']; ?>">

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
                <h3 class="card-title">Employment Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

                <div class="card-body">
                  <div class="form-group"><span>Employment Status</span>
                  <input type="text" placeholder="Employment Status" id="user_name" name="current_org" class="form-control" value="<?php echo $row_alum['status']; ?>">
                        

                  </div>

                  <div class="form-group"><span>Current Organization</span>
                  <input type="text" placeholder="Current Organization" id="user_name" name="current_org" class="form-control" value="<?php echo $row_alum['current_org']; ?>" >
                        
                  </div>
                  <div class="form-group"><span>Primary Work Location</span>
                  <input type="text" placeholder="Primary Work Location" id="user_name" name="current_org" class="form-control" value="<?php echo $row_alum['location']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Type of Organization</span>
                  <input type="text" placeholder="Type of Organization" id="user_name" name="current_org" class="form-control" value="<?php echo $row_alum['type']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Current Job Title / Designation</span>
                  <input type="text" placeholder="Current Job Title / Designation" name="current_title" class="form-control" value="<?php echo $row_alum['current_title']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Company Address</span>
                  <input type="text" placeholder="Company Address" id="user_name" name="current_org" class="form-control" value="<?php echo $row_alum['company_add']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Length of Employment</span>
                  <input type="text" placeholder="Length of Employment" id="user_name" name="current_org" class="form-control" value="<?php echo $row_alum['length']; ?>" >
                        
                  </div>
                  <div class="form-group"><span>Is your job related to your course in SFAC?</span>
                  <input type="text" placeholder="Is your job related to your course in SFAC?" id="user_name" name="current_org" class="form-control" value="<?php echo $row_alum['align']; ?>">
                        
                  </div>
                  <div class="form-group"><span>How satisfied are you with your current job?</span>
                  <input type="text" placeholder="How satisfied are you with your current job?" id="user_name" name="current_org" class="form-control" value="<?php echo $row_alum['satisfy']; ?>">
                        
                  </div>
                  <div class="form-group"><span>Which of the following would you like to collaborate with us?</span>
                  <input type="text" placeholder="Which of the following would you like to collaborate with us?"  name="topic" class="form-control" value="<?php echo $row_alum['collaborate']; ?>" >
                        
                  </div>
                  <div class="form-group"><span>topic/area/activity</span>
                  <input type="text" placeholder="topic/area/activity"  name="topic" class="form-control" value="<?php echo $row_alum['topic']; ?>">
                        
                  </div>
                  


                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="information" class="btn btn-danger float-right">Update Basic Information</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


         
              <!-- /.card-header -->
              <!-- form start -->
              
              
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