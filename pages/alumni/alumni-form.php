<?php 
ob_start();
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";

if (isset($_GET['campus'])) {
    $_SESSION['campus'] = $_GET['campus'];
  
  } else {
    if (isset($_SESSION['campus']) && $_SESSION['campus'] != "All") {
      $_SESSION['campus'] = $_SESSION['campus'];
  
    } else {
      $_SESSION['campus'] = "All";
  
    }
  }

if (isset($_GET['department'])) {
    $_SESSION['department'] = $_GET['department'];
  
  } else {
  
    if (isset($_SESSION['department']) && $_SESSION['department'] != "All") {
      $_SESSION['department'] = $_SESSION['department'];
  
    } else {
      $_SESSION['department'] = "All";
    }
  
  }


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
  .form-control {
    border: 1px solid #ddd;
    height: 50px;
  }
  .form-control:focus{
    border: 1px #000;
    outline: none;
  }
  .btn-search {
    height: 50px;
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
            <h1 class="m-0">Feedback</h1>
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
<center>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        

        <body class="g-sidenav-show  bg-gray-200">

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

<div class="container-fluid py-4">
<div class="row mt-4">
    <div class="col-12">
        <div class="card px-4 pb-4">
            <h2 class="text-center mb-0 pt-4">Alumni Form List</h2>
            <h5 class="text-center">
            <b>Campus:</b> <?php echo $_SESSION['campus'] ?> <br>
            <b>Department:</b> <?php echo $_SESSION['department'] ?> <br>
            <?php
              $department = mysqli_query($db, "SELECT * FROM tbl_department ORDER BY department ASC");
              while ($row = mysqli_fetch_array($department)) {
                if ($_SESSION['campus'] == "All") {
                  $result = mysqli_query($db, "SELECT * FROM tbl_form
                                LEFT JOIN tbl_program ON tbl_program.program_id = tbl_form.program_id
                                LEFT JOIN tbl_department ON tbl_department.dep_id = tbl_program.dep_id
                                WHERE department = '$row[department]'");
                  $num_rows = mysqli_num_rows($result);
                } else {
                  $result = mysqli_query($db, "SELECT * FROM tbl_form
                            LEFT JOIN tbl_campus ON tbl_campus.campus_id = tbl_form.campus_id
                            LEFT JOIN tbl_program ON tbl_program.program_id = tbl_form.program_id
                            LEFT JOIN tbl_department ON tbl_department.dep_id = tbl_program.dep_id
                            WHERE campus = '$_SESSION[campus]' AND department = '$row[department]'");
                  $num_rows = mysqli_num_rows($result);
                }
                ?>
                <b>
                </b>
                <?php
              }
              ?>
            </h5>
            <!-- Search Bar -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="GET" class="form-horizontal">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Search for Name, Campus, Batch..." name="search">
                            <button name="submit" type="submit" class="btn btn-lg btn-info btn-search">
                                <i class="fa fa-search"></i>
                            </button>
                            <button type="button" class="btn btn-lg btn-info mx-1" data-toggle="modal"
                                data-target="#filter">
                                <i class="fas fa-sliders-h"></i> Filter
                            </button>
                        </div>
                    </form>
            
            <!-- Filter -->
            <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 style="font-weight: bold" class="modal-title" id="myModalLabel"><i
                            class="glyphicon glyphicon-user"></i> Search Filter</h4>
                      </div>
                      <div class="modal-body">
                        <form method="GET">
                          <div class="form-group">
                            <div class="col-md">
                              <label for="campus">Campus</label>
                              <select name="campus" class="form-control" tabindex="-1" required="required">
                                <?php
                                if ($_SESSION['campus'] == "All") {
                                  ?>
                                  <option value="All">All (Current Selected)
                                  </option>
                                  </option>
                                  <?php
                                  $result = mysqli_query($db, "SELECT * FROM tbl_campus") or die(mysqli_error($db));
                                  while ($row4 = mysqli_fetch_array($result)) {
                                    $id = $row4['campus_id'];
                                    ?>
                                    <option value="<?php echo $row4['campus']; ?>">
                                      <?php echo $row4['campus']; ?>
                                    </option>
                                  <?php } ?>
                                  <?php
                                } else {
                                  ?>
                                  </option>
                                  <?php
                                  $result = mysqli_query($db, "SELECT * FROM tbl_campus WHERE campus = '$_SESSION[campus]'") or die(mysqli_error($db));
                                  while ($row4 = mysqli_fetch_array($result)) {
                                    $id = $row4['campus_id'];
                                    ?>
                                    <option value="<?php echo $row4['campus']; ?>">
                                      <?php echo $row4['campus']; ?> (Current Selected)
                                    </option>
                                  <?php } ?>
                                  </option>
                                  <?php
                                  $result = mysqli_query($db, "SELECT * FROM tbl_campus WHERE campus NOT IN ('$_SESSION[campus]')") or die(mysqli_error($db));
                                  while ($row4 = mysqli_fetch_array($result)) {
                                    $id = $row4['campus_id'];
                                    ?>
                                    <option value="<?php echo $row4['campus']; ?>">
                                      <?php echo $row4['campus']; ?>
                                    </option>
                                  <?php } ?>
                                  <option value="All"> All
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>

                          <div class="col-md">
                              <label for="department"><br>Department</label>
                              <select name="department" class="form-control" tabindex="-1" required="required">
                                <?php
                                if ($_SESSION['department'] == "All") {
                                  ?>
                                  <option value="All">All (Current Selected)
                                  </option>
                                  </option>
                                  <?php
                                  $result = mysqli_query($db, "SELECT * FROM tbl_department") or die(mysqli_error($db));
                                  while ($row4 = mysqli_fetch_array($result)) {
                                    $id = $row4['department_id'];
                                    ?>
                                    <option value="<?php echo $row4['department']; ?>">
                                      <?php echo $row4['department']; ?>
                                    </option>
                                  <?php } ?>
                                  <?php
                                } else {
                                  ?>
                                  </option>
                                  <?php
                                  $result = mysqli_query($db, "SELECT * FROM tbl_department WHERE department = '$_SESSION[department]'") or die(mysqli_error($db));
                                  while ($row4 = mysqli_fetch_array($result)) {
                                    $id = $row4['department_id'];
                                    ?>
                                    <option value="<?php echo $row4['department']; ?>">
                                      <?php echo $row4['department']; ?> (Current Selected)
                                    </option>
                                  <?php } ?>
                                  </option>
                                  <?php
                                  $result = mysqli_query($db, "SELECT * FROM tbl_department WHERE department NOT IN ('$_SESSION[department]')") or die(mysqli_error($db));
                                  while ($row4 = mysqli_fetch_array($result)) {
                                    $id = $row4['department_id'];
                                    ?>
                                    <option value="<?php echo $row4['department']; ?>">
                                      <?php echo $row4['department']; ?>
                                    </option>
                                  <?php } ?>
                                  <option value="All">All
                                  </option>
                                  <?php
                                }
                                ?>
                              </select>
                          </div>

                          <div class="modal-footer">
                            <button class="btn btn-dark" data-dismiss="modal" aria-hidden="true"><i
                                class="glyphicon glyphicon-remove icon-white"></i> No</button>
                            <button type="submit" class="btn btn-info"><i
                                class="glyphicon glyphicon-ok icon-white"></i> Yes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

            <form method="POST" action="userData/ctrl-email.php">
                <div class="d-flex">
                    <div class="dropdown pt-4">
                        <a href="javascript:;" class="btn btn-icon bg-gradient-primary "
                            data-bs-toggle="dropdown" id="navbarDropdownMenuLink2">
                            <span class="material-icons">email</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3"
                            aria-labelledby="navbarDropdownMenuLink2" data-popper-placement="left-start">
                            <li><button type="submit" name="sendEmail"
                                    class="dropdown-item border-radius-md">Email All Alumni</button></li>
                        </ul>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="searchTable" class="table table-flush" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th>
                                    <div class="form-check">
                                        <input class="form-check-input mt-1" type="checkbox" value="all" name="all" id="all">
                                    </div>
                                </th>
                                <!-- <th></th> -->
                                <th>Student No.</th>
                                <th>Fullname</th>
                                <th>Batch</th>
                                <th>Program</th>
                                <th>Position</th>
                                <th>Employment Status</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Campus</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (isset($_GET['submit'])) { 
                            if ($_SESSION['campus'] == "All" && $_SESSION['department'] == "All") {
                              $return_query = mysqli_query($db, "SELECT * FROM tbl_form 
                                  LEFT JOIN tbl_campus USING (campus_id)
                                  LEFT JOIN tbl_program ON tbl_program.program_id = tbl_form.program_id
                                  LEFT JOIN tbl_alumni ON tbl_alumni.alumni_id = tbl_form.alumni_id
                                  LEFT JOIN tbl_employment_status ON tbl_employment_status.emp_status_id = tbl_form.emp_status_id
                                  LEFT JOIN tbl_batch ON tbl_batch.batch_id = tbl_form.batch_id
                                  LEFT JOIN tbl_department ON tbl_department.dep_id = tbl_program.dep_id
                                  WHERE 
                                    tbl_alumni.firstname LIKE '%$_GET[search]%' 
                                      OR tbl_alumni.lastname LIKE '%$_GET[search]%'
                                      OR tbl_alumni.stud_no LIKE '%$_GET[search]%'
                                      OR tbl_batch.batch LIKE '%$_GET[search]%'
                                      OR tbl_program.course_abv LIKE '%$_GET[search]%'
                                      OR tbl_form.current_title LIKE '%$_GET[search]%'
                                      OR tbl_employment_status.status LIKE '%$_GET[search]%'
                                      OR tbl_form.email LIKE '%$_GET[search]%'
                                      OR tbl_form.contact LIKE '%$_GET[search]%'
                                      OR tbl_campus.campus LIKE '%$_GET[search]%'
                                      OR tbl_department.department LIKE '%$_GET[search]%'
                              ") or die(mysqli_error($db)); 
                              } else { 
                                  if ($_SESSION['campus'] != "All" && $_SESSION['department'] == "All") { 
                                  $return_query = mysqli_query($db, "SELECT * FROM tbl_form 
                                      LEFT JOIN tbl_campus USING (campus_id)
                                      LEFT JOIN tbl_program ON tbl_program.program_id = tbl_form.program_id
                                      LEFT JOIN tbl_alumni ON tbl_alumni.alumni_id = tbl_form.alumni_id
                                      LEFT JOIN tbl_employment_status ON tbl_employment_status.emp_status_id = tbl_form.emp_status_id
                                      LEFT JOIN tbl_batch ON tbl_batch.batch_id = tbl_form.batch_id
                                      LEFT JOIN tbl_department ON tbl_department.dep_id = tbl_program.dep_id
                                      WHERE 
                                          tbl_campus.campus = '$_SESSION[campus]' AND (
                                            tbl_alumni.firstname LIKE '%$_GET[search]%' 
                                              OR tbl_alumni.lastname LIKE '%$_GET[search]%'
                                              OR tbl_alumni.stud_no LIKE '%$_GET[search]%'
                                              OR tbl_batch.batch LIKE '%$_GET[search]%'
                                              OR tbl_program.course_abv LIKE '%$_GET[search]%'
                                              OR tbl_form.current_title LIKE '%$_GET[search]%'
                                              OR tbl_employment_status.status LIKE '%$_GET[search]%'
                                              OR tbl_form.email LIKE '%$_GET[search]%'
                                              OR tbl_form.contact LIKE '%$_GET[search]%'
                                              OR tbl_campus.campus LIKE '%$_GET[search]%'
                                              OR tbl_department.department LIKE '%$_GET[search]%'
                                          )
                                      ")
                                  or die(mysqli_error($db));
                              } elseif ($_SESSION['campus'] == "All" && $_SESSION['department'] != "All") {
                                  $return_query = mysqli_query($db, "SELECT * FROM tbl_form 
                                      LEFT JOIN tbl_campus USING (campus_id)
                                      LEFT JOIN tbl_program ON tbl_program.program_id = tbl_form.program_id
                                      LEFT JOIN tbl_alumni ON tbl_alumni.alumni_id = tbl_form.alumni_id
                                      LEFT JOIN tbl_employment_status ON tbl_employment_status.emp_status_id = tbl_form.emp_status_id
                                      LEFT JOIN tbl_batch ON tbl_batch.batch_id = tbl_form.batch_id
                                      LEFT JOIN tbl_department ON tbl_department.dep_id = tbl_program.dep_id
                                      WHERE 
                                          tbl_campus.campus = '$_SESSION[campus]' AND (
                                            tbl_alumni.firstname LIKE '%$_GET[search]%' 
                                              OR tbl_alumni.lastname LIKE '%$_GET[search]%'
                                              OR tbl_alumni.stud_no LIKE '%$_GET[search]%'
                                              OR tbl_batch.batch LIKE '%$_GET[search]%'
                                              OR tbl_program.course_abv LIKE '%$_GET[search]%'
                                              OR tbl_form.current_title LIKE '%$_GET[search]%'
                                              OR tbl_employment_status.status LIKE '%$_GET[search]%'
                                              OR tbl_form.email LIKE '%$_GET[search]%'
                                              OR tbl_form.contact LIKE '%$_GET[search]%'
                                              OR tbl_campus.campus LIKE '%$_GET[search]%'
                                              OR tbl_department.department LIKE '%$_GET[search]%'
                                          )
                                      ")
                                  or die(mysqli_error($db));
                              } elseif ($_SESSION['campus'] != "All" && $_SESSION['department'] != "All") {
                                  $return_query = mysqli_query($db, "SELECT * FROM tbl_form 
                                      LEFT JOIN tbl_campus USING (campus_id)
                                      LEFT JOIN tbl_program ON tbl_program.program_id = tbl_form.program_id
                                      LEFT JOIN tbl_alumni ON tbl_alumni.alumni_id = tbl_form.alumni_id
                                      LEFT JOIN tbl_employment_status ON tbl_employment_status.emp_status_id = tbl_form.emp_status_id
                                      LEFT JOIN tbl_batch ON tbl_batch.batch_id = tbl_form.batch_id
                                      LEFT JOIN tbl_department ON tbl_department.dep_id = tbl_program.dep_id
                                      WHERE 
                                          tbl_campus.campus = '$_SESSION[campus]' AND (
                                            tbl_alumni.firstname LIKE '%$_GET[search]%' 
                                              OR tbl_alumni.lastname LIKE '%$_GET[search]%'
                                              OR tbl_alumni.stud_no LIKE '%$_GET[search]%'
                                              OR tbl_batch.batch LIKE '%$_GET[search]%'
                                              OR tbl_program.course_abv LIKE '%$_GET[search]%'
                                              OR tbl_form.current_title LIKE '%$_GET[search]%'
                                              OR tbl_employment_status.status LIKE '%$_GET[search]%'
                                              OR tbl_form.email LIKE '%$_GET[search]%'
                                              OR tbl_form.contact LIKE '%$_GET[search]%'
                                              OR tbl_campus.campus LIKE '%$_GET[search]%'
                                              OR tbl_department.department LIKE '%$_GET[search]%'
                                          )
                                      ")
                                  or die(mysqli_error($db));
                              }}
                          
                          while ($row = mysqli_fetch_array($return_query)) {
                              $id = $row['alumni_id']; 
                              ?>
                              <tr>
                                  <!-- <td><div class="form-check"><input class="form-check-input mt-1" type="checkbox" value="all" name="all" id="all"></div></td> -->
                                  <td><?php echo (empty($row['img'])) ? '<img src="../../assets/img/image.png" class="border-radius-lg shadow-sm zoom" style="height:80px; width="80px"; object-fit:cover;" alt="img">' : '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '"
                                      class="border-radius-lg shadow-sm zoom" style="height:80px; width="80px"; object-fit:cover;" alt="img">' ?></td></div>
                                  <td><?php echo $row['stud_no']; ?></td>
                                  <td><?php echo $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'];?></td>
                                  <td><?php echo $row['batch']; ?></td>
                                  <td><?php echo $row['course_abv']; ?></td>
                                  <td><?php echo $row['current_title']; ?></td>
                                  <td><?php echo $row['status']; ?></td>
                                  <td><?php echo $row['email']; ?></td>
                                  <td><?php echo $row['contact']; ?></td>
                                  <td><?php echo $row['campus']; ?></td>
                                  <td><?php echo $row['department']; ?></td>

                                  <?php if ($_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Admin") {?>
                                      <td class="text-sm font-weight-normal">
                                          <a class="btn btn-link text-success px-3 mb-0" href="view-data.php?formID=<?php echo $row['form_id']?>">
                                          <!-- <i class="material-icons text-sm me-2">visibility</i> -->
                                          View</a>
                                          <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="#" onclick="showDeleteConfirmation('<?php echo $row['form_id']?>')">
                                          <!-- <i class="material-icons text-sm me-2">delete</i> -->
                                          Delete</a>
                                      </td>
                                  <?php } elseif ($_SESSION['role'] == "Registrar"){?>
                                      <td class="text-sm font-weight-normal">
                                          <a class="btn btn-link text-success px-3 mb-0" href="view-data.php?formID=<?php echo $row['form_id']?>"><i class="material-icons text-sm me-2">visibility</i>View</a>
                                      </td>
                                  <?php } ?>
                              </tr>
                          <?php }} 
                          ?>
                      </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</main>

<script>
function showDeleteConfirmation(formID) {
    if (confirm("Are you sure you want to delete this record?")) {
        window.location.href = "../alumni/userData/ctrl-del-form.php?formID=" + formID;
    } else {
    }
}
</script>




<!-- ==================================== -->

</center>


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