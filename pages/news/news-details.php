<?php 
ob_start();
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";

if ($_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Admin" || $_SESSION['role'] == "Registrar" || $_SESSION['role'] == "Student" || $_SESSION['role'] == "Alum Stud")
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

        .back-button {
            margin-left: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            color: #fff;
            background-color: #0056b3;
        }

        .date-published {
            color: #888;
        }

        .delete-button {
            padding: 5px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
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
        




      <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">


<?php

if (isset($_GET['id'])) {
    $newsId = $_GET['id'];
    $query = $db->prepare("SELECT * FROM tbl_news WHERE id = ?");
    $query->bind_param("i", $newsId);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="container mt-6" style="background-color: white; padding-bottom: 20px;">';
        echo '<h2>' . $row['title'] . '</h2>';
        
        if (!empty($row['image_filename'])) {
            echo '<img src="newsimages/' . $row['image_filename'] . '" alt="' . $row['title'] . '">';
        }

        echo '<p style="text-indent: 25px; text-align: justify;">' . $row['content'] . '</p>';
        echo '<p id="viewCount_' . $row['id'] . '" style="margin-top: 20px;font-size: 17px;">Date Published: ' . $row['date_published'] . ' | Views: ' . $row['view_count'] . '</p>';
        echo '<a class="back-button" style="margin-bottom: 15px;" href="news-display.php">Back to News</a>';

        if ($_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Admin"){
            echo '<form method="post" style="margin-top: 10px; margin-left: 10px;" onsubmit="return confirmDelete();">';
            echo '<input type="hidden" name="news_id" value="' . $row['id'] . '">';
            echo '<button type="submit" class="delete-button">Delete</button>';
            echo '</form>'; }

        echo '</div>';
    } else {
        echo '<p>No news article found.</p>';
    }

    $query->close();
} else {
    echo '<p>No news article ID specified.</p>';
}
?>


</main>


<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this news article?");
    }
</script>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $newsId = $_POST["news_id"];

  $sql = "DELETE FROM tbl_news WHERE id = ?";
  $stmt = $db->prepare($sql);
  $stmt->bind_param("i", $newsId);

  if ($stmt->execute()) {
      echo "<script language=javascript>alert('News deleted successfully!')</script>";
      echo "<script> document.location='news-display.php' </script>";
  } else {
      echo "<script language=javascript>alert('News deletion unsuccessful.')</script>";
      echo "<script> document.location='news-display.php' </script>";
  }

  $stmt->close();
}
?>

            




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