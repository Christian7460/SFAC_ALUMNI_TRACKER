<?php 
ob_start();
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";
include '../../includes/fetchData.php';

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
            





        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <div class="container-fluid py-4">
      <div class="row">
          <div class="col-xl-7 col-sm-6 mb-xl-0 mb-4">
          <div class="card">         
            <form method="POST" action="userData/ctrl-add-batch.php">
              <div class="main active">
                <!-- <img class="resize" src="../../assets/img/sfac.png"> -->
                <div class="text">
                <h2>Add Batch</h2>
                </div>
                <div class="input-text">
                  <div class="input-div"><span>Add batch year</span> <br>
                    <input type="text" required require id="user_name" name="batch">
                    
                  </div>
                </div>
            <div class="buttons button_space">
                <br>
              <!-- <button class="back_button ">Back</button> -->
              <button class="btn btn-info submit_button" name="submit">Submit</button>
            </div>
            </div>
            </form>
          </div>
          </div>
          

          <div class="col-xl-5 col-sm-6 mb-xl-0 mb-4">
            <div class="card">   
              <form method="POST" action="userData/ctrl-del-batch.php">                          
              <div class="main active">
                <!-- <img class="resize" src="../../assets/img/sfac.png"> -->
                <div class="text">
                <h2>Batch List</h2>
                </div>
                
                <div class="input-text">
                    <br>
                   <select name="batch">                   <br>
                          <option selected disabled>Batch List</option>                         
                          <?php
                          foreach ($batch as $Batch) {
                          ?>
                            <option value="<?php echo $Batch['batch_id'] ?>">
                              <?php echo $Batch['batch'] ?>
                            </option>

                          <?php
                          }
                          ?>
                        </select>
                </div>

            <div class="buttons button_space"> 
                <br>            
              <button type="submit" class="btn btn-danger d-sm-inline d-none" name="submit_del" >
                <!-- <i class="material-icons text-sm me-2">delete</i> -->
              Delete</button>
            </div>         
            </div>           
          </div>
                        </div>
            </form>
            </div> 
                    
          
        
        
      </div>
    
  </main>
  <script>
    <?php 
      if (!empty($_SESSION['addBatch'])) {     
    ?>
            Swal.fire("Batch", "Added Successfully", "success");
    <?php 
    unset($_SESSION['addBatch']);
  } 
  ?>
  <?php 
      if (!empty($_SESSION['successDel'])) {     
    ?>
            Swal.fire("Batch", "Deleted Successfully", "success");
    <?php 
    unset($_SESSION['successDel']);
  } 
  ?>

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