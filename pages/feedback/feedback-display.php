<?php 
ob_start();
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";


$totalEntriesQuery = $db->query("SELECT COUNT(*) as total FROM tbl_feedback");
$totalEntries = $totalEntriesQuery->fetch_assoc()['total'];
$entriesPerPage = 7;
$totalPages = ceil($totalEntries / $entriesPerPage);

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
            

        <?php if ($_SESSION['role'] == "Super Administrator") {?>
<!-- Sidebar -->
<!-- End Sidebar -->
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
<!-- Navbar -->
<!-- End Navbar -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="feedback-list">
                <h3 class="text-center mb-4" style="font-family: sans-serif;">Feedbacks</h3>
                <?php

                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($currentPage - 1) * $entriesPerPage;

                $query = $db->query("SELECT * FROM tbl_feedback ORDER BY id DESC LIMIT $offset, $entriesPerPage");

                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        echo '<div class="feedback" style="color: black; border: 1px solid black; padding: 10px; border-radius: 10px; margin-bottom: 15px;">';
                        if ($row['anonymous'] == 0) {
                            echo '<strong>Name:</strong> ' . $row['user'] . '<br>';
                            echo '<strong>Email:</strong> ' . $row['email'] . '<br>';
                        } else {
                            echo '<strong>Name: </strong> ';
                            echo '<span style="color: gray;">(Anonymous) </span>';
                            echo '<strong></strong> ' . $row['user'] . '<br>';
                            echo '<strong>Email: </strong> ';
                            echo '<span style="color: gray;">(Anonymous) </span>';
                            echo '<strong></strong> ' . $row['email'] . '<br>';
                        }
                        echo '<strong>Rating:</strong> ' . $row['rating'] . '<br>';
                        echo '<strong>Feedback:</strong> ' . $row['feedback'] . '<br>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">No feedbacks yet.</p>';
                }
                ?>
            </div>
            <ul class="pagination justify-content-center">
                <?php
                if ($currentPage > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '" aria-label="Previous"><span aria-hidden="true">&larr;</span></a></li>';
                }

                for ($i = 1; $i <= $totalPages; $i++) {
                    $activeClass = ($i == $currentPage) ? 'active' : '';
                    echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                if ($currentPage < $totalPages) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '" aria-label="Next"><span aria-hidden="true">&rarr;</span></a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php } else if ($_SESSION['role'] == "Admin") { ?>

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="feedback-list">
                <h3 class="text-center mb-4" style="font-family: sans-serif;">Feedbacks</h3>
                <?php

                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($currentPage - 1) * $entriesPerPage;

                $query = $db->query("SELECT * FROM tbl_feedback ORDER BY id DESC LIMIT $offset, $entriesPerPage");

                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        echo '<div class="feedback" style="color: black; border: 1px solid black; padding: 10px; border-radius: 10px; margin-bottom: 15px;">';
                        if ($row['anonymous'] == 0) {
                            echo '<strong>Name:</strong> ' . $row['user'] . '<br>';
                            echo '<strong>Email:</strong> ' . $row['email'] . '<br>';
                        } else {
                            echo '<strong>Name:</strong> Anonymous <br>';
                            echo '<strong>Email:</strong> Anonymous <br>';
                        }
                        echo '<strong>Rating:</strong> ' . $row['rating'] . '<br>';
                        echo '<strong>Feedback:</strong> ' . $row['feedback'] . '<br>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">No feedbacks yet.</p>';
                }
                ?>
            </div>
            <ul class="pagination justify-content-center">
                <?php
                if ($currentPage > 1) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '" aria-label="Previous"><span aria-hidden="true">&larr;</span></a></li>';
                }

                for ($i = 1; $i <= $totalPages; $i++) {
                    $activeClass = ($i == $currentPage) ? 'active' : '';
                    echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                if ($currentPage < $totalPages) {
                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '" aria-label="Next"><span aria-hidden="true">&rarr;</span></a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</div>




</main>




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
?><?php }?>
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