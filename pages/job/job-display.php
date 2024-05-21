<?php 
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";


$totalEntriesQuery = $db->query("SELECT COUNT(*) as total FROM tbl_job");
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
  <title>SFAC Alumni Tracker</title>

  <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .job-list {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 20px;
        }

        .feedback {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        .pagination-hidden {
        display: none;
        }
        
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); 
            backdrop-filter: blur(3px);
            z-index: 1;
        }

        #jobInfoModal .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 53%;
            transform: translate(-50%, -50%);
            border: 1px transparent;
            background-color: transparent;
            padding: 20px;
            border-radius: 10px;
            z-index: 3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-content {
            color: black;
            max-width: 600px;
            margin: 10% auto;
            padding: 30px;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .feedback a {
            font-weight: bold;
            color: #fc6060;
            text-decoration: none;
        }

        .feedback a:hover {
            font-weight: bold;
            color: blue;
            text-decoration: underline;
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
            <h1 class="m-0">Job Opportunities</h1>
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


<div class="container" style="margin-right: 3%;">
    <div class="row">
        <div class="col-md-10">
            <div class="job-list">
                <h3 class="text-center mb-4" style="font-family: sans-serif;">Job Opportunities</h3>
                <?php

                $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                $offset = ($currentPage - 1) * $entriesPerPage;

                $query = $db->query("SELECT * FROM tbl_job WHERE request_id = 1 ORDER BY id DESC LIMIT $offset, $entriesPerPage");


                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        echo '<div class="feedback" style="color: black; border: 1px solid black; padding: 10px; border-radius: 10px; margin-bottom: 15px;">';
                        
                        echo '<div class="row">';
                        echo '<div class="col-md-6"><strong><span style="margin-right: 10px;">' . $row['job_name'] . '</span></strong>';
                        echo '<span style="color: #888;"><i class="bi bi-eye"></i>' . $row['view_count'] . '</span></div>';
                        echo '</div>';
                        
                        echo '<div class="row mt-2">';
                        echo '<div class="col-md-6">Offered by: <strong>' . $row['name'] . '</strong></div>';
                        echo '<div class="col-md-6 text-md-end">';
                        echo '<a href="#" onclick="showJobInfo(' . $row['id'] . ', ' . $row['view_count'] . ')">See details</a>';
                        
                        if ($row['user'] == $user_name || $_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Registrar") {
                            echo '<a href="#" style="margin-left: 10px;" onclick="deleteJob(' . $row['id'] . ')"><i class="fas fa-trash-alt"></i></a>';
                        }
                        
                        echo '</div>';
                        echo '</div>';
                        
                        echo '<div class="modal-overlay" id="modalOverlay"></div>
                        <div id="jobInfoModal' . $row['id'] . '" class="modal" style="display: none;">
                            <div class="modal-content">
                                <span class="close" style="margin-right: 10px;" onclick="closeJobInfo(' . $row['id'] . ')">&times;</span>
                                <strong span style="font-size: 22px;">' . $row['job_name'] . '</span></strong>
                                <span style="color: #888;"><i class="bi bi-eye-fill"></i>' . $row['view_count'] . '</span>
                                <a style="font-size: 18px;">(Posted on: ' . $row['date'] . ')</a><br>
                                <span style="font-size: 18px; margin-left: 15px;"> <strong>Job Description:</strong> <br>' . $row['job_desc'] . '</span><br><br>
                                <span style="font-size: 18px;">Offered by: <strong>' . $row['name'] . '</strong></span>
                                <span style="font-size: 18px; margin-left: 40px; margin-top: 10px;">Email: '. $row['email'] .'</span>
                                <span style="font-size: 18px; margin-left: 40px;">Contact: '. $row['contact'] .'<br></span>
                            </div>
                        </div>';

                
                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center" style="font-size: 18px;">No job opportunities yet.</p>';
                }
                
                ?>
            </div>
            <ul id="pagination" class="pagination justify-content-center">
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

<script>
    function showJobInfo(jobId, viewCount) {
    var modalOverlay = document.getElementById('modalOverlay');
    var modal = document.getElementById('jobInfoModal' + jobId);
    var pagination = document.getElementById('pagination');

    viewCount++;
    updateViewCount(jobId, viewCount);

    var viewCountElement = document.querySelector('.job-view-count-' + jobId);
    if (viewCountElement) {
        viewCountElement.innerHTML = '(Views: ' + viewCount + ')';
    }

    modalOverlay.style.display = 'block';
    modal.style.display = 'block';
    pagination.classList.add('pagination-hidden');
}

    function closeJobInfo(jobId) {
        var modalOverlay = document.getElementById('modalOverlay');
        var modal = document.getElementById('jobInfoModal' + jobId);
        var pagination = document.getElementById('pagination');

        modalOverlay.style.display = 'none';
        modal.style.display = 'none';
        pagination.classList.remove('pagination-hidden');
    }

    // Close modal on outside click
    window.onclick = function(event) {
        var modalOverlay = document.getElementById('modalOverlay');
        var pagination = document.getElementById('pagination');

        if (event.target.className === 'modal-overlay') {
            modalOverlay.style.display = 'none';
            document.querySelector('.modal').style.display = 'none';
            pagination.classList.remove('pagination-hidden');
        }
    };

    function deleteJob(jobId) {
        var confirmDelete = confirm('Are you sure you want to delete this job?');

        if (confirmDelete) {
            window.location.href = 'delete-job.php?id=' + jobId;
        }
    }

    function updateViewCount(jobId, viewCount) {
        // Use AJAX to send a request to update the view count in the database
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Optional: You can handle the response if needed
            }
        };
        xhttp.open("GET", "update-view-count.php?id=" + jobId + "&view_count=" + viewCount, true);
        xhttp.send();
    }
</script>



</div>
<!-- ========================================= -->

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->


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