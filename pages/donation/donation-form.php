<?php 
ob_start();
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";

if ($_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Registrar"
|| $_SESSION['role'] == "Alum Stud" || $_SESSION['role'] == "Student")
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
            <h1 class="m-0">Donation</h1>
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
            

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

    <!-- <div class="container-fluid py-4" style="padding: 20px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card px-4 pb-4">
                <div class="text-start pt-4">
                    <p class="text-lg mb-0 text-capitalize text-bold text-dark">Institution Details</p>
                </div>
                <div class="row mt-0">
                    <div class="col-md-6 text-center">
                        <h3 style="margin: 0 0 10px 25px;">Institution</h3>
                        <p style="text-align: justify; margin: 0 0 0 50px; color: black; font-size: 18px;">
                            Eastwest Bank Deposit/Mobile Transfer <br>
                            Bank Account: Eastwest Bank Deposit <br>
                            Account Name: Saint Francis of Assisi College of Cavite <br>
                            Account Number: 2000-0271-4719 <br>
                            Branch: Molino Boulevard <br> <br>
                            
                            Gcash Online Fund Transfer <br>
                            Bank: EastWest Bank <br>
                            Account Name: SFAC Bacoor Campus <br>
                            Account Number: 2000-0271-4719
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid py-2">
    <div class="row mt-1 justify-content-center">
        <div class="col-md-6 mb-3">
            <div class="card px-3 pb-3">
                <div class="col-md-12">
                    <h3 class="text-center mt-3 mb-2">Institution</h3>
                    <p style="text-align: justify; margin: 10px 30px; color: black; font-size: 20px; line-height: 1.6;">
                        Eastwest Bank Deposit/Mobile Transfer <br>
                        Bank Account: Eastwest Bank Deposit <br>
                        Account Name: Saint Francis of Assisi College of Cavite <br>
                        Account Number: 2000-0271-4719 <br>
                        Branch: Molino Boulevard <br> <br>
                        
                        Gcash Online Fund Transfer <br>
                        Bank: EastWest Bank <br>
                        Account Name: SFAC Bacoor Campus <br>
                        Account Number: 2000-0271-4719
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card px-3 pb-3">
                <h3 class="text-center mt-3 mb-2">Sir Ralph Arjay Dela Cruz</h3>
                <div class="row align-items-center">
                    <div class="col-md-6 align-self-center text-center">
                        <img src="sir-ralph.jpg" style="height: 330px; padding: 9px; border-radius: 20px;" alt="default.jpg" class="img img-fluid">
                    </div>
                    <div class="col-md-6">
                        <p style="text-align: justify; text-indent: 7%; margin-top: 6%; margin-left: 6%; margin-right: 6%; color: black; font-size: 20px;">
                            In case of other donation concerns, you can contact this person using these provided links. <br><br>
                        </p>
                        <div class="d-flex justify-content-center flex-wrap">
                            <a href="https://www.facebook.com/arjay.cruz.961" target="_blank" class="btn btn-dark m-2">
                                <i class="bi bi-facebook" style="font-size: 24px;"></i>
                            </a>
                            <a href="mailto:info@stfrancis.edu.ph" target="_blank" class="btn btn-dark m-2">
                                <i class="bi bi-envelope-at-fill" style="font-size: 24px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>




    <div class="container-fluid py-2">
        <div class="row mt-1 justify-content-center">
            <div class="col-md-8">
                <div class="card px-3 pb-3">
                    <div class="col-md-12">
                            <h3 class="text-center mt-3 mb-2">Thank You!</h3>
                            <p style="text-indent: 25px; text-align: justify; margin: 10px 30px; color: black; font-size: 20px; line-height: 1.6;">
                                To successfully organize events and initiatives,
                                we rely on the generous contributions from individuals and organizations like yours.
                                Your past donations have made a significant difference, enabling us to create
                                enriching experiences for our students and extend support to those who require it
                                the most. <br><br>

                                We kindly request your continued support through donations, either monetary
                                or in-kind, for our upcoming events and community outreach programs. Your contribution 
                                will directly benefit our students and the broader community, allowing us to provide 
                                them with resources, opportunities, and support they need to succeed.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>


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