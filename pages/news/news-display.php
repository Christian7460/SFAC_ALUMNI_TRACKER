<?php 
ob_start();
include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/conn.php";
include "../../includes/sidebar.php";

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
            <h1 class="m-0">News Updates</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            
          <?php
$newsPerPage = 3;
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($currentPage - 1) * $newsPerPage;

$query = $db->query("SELECT id, title, image_filename, content, date_published, view_count FROM tbl_news ORDER BY date_published DESC LIMIT $offset, $newsPerPage");

while ($row = $query->fetch_assoc()) {
    echo '<div class="container" style="background-color: white; color: black; border: transparent; padding: 10px; border-radius: 10px; margin-top: 10px; margin-bottom: 15px;">';
    echo '<h2>' . $row['title'] . '</h2>';
    
    if (!empty($row['image_filename'])) {
        echo '<img style="width: 100%; max-width: 100%; height: auto; border-radius: 5px; margin-bottom: 10px;" src="newsimages/' . $row['image_filename'] . '" alt="default.jpg">';
    }

    $content = $row['content'];
    $wordLimit = 31;
    $words = explode(' ', $content);
    $limitedContent = implode(' ', array_slice($words, 0, $wordLimit));

    echo '<p style="text-indent: 25px; margin-bottom: 15px; font-size: 19px;" text-align: justify;>' . $limitedContent;
    
    if (count($words) > $wordLimit) {
        echo ' ...<br>';
        
    }
    echo '</p>';
    // Inside your while loop
    echo '<a class="button" style="margin-top: 20px;" href="news-details.php?id=' . $row['id'] . '" onclick="updateViewCount(' . $row['id'] . ')">Read more</a>';

    if ($_SESSION['role'] == "Super Administrator" || $_SESSION['role'] == "Admin"){
        echo '<form method="post" action="delete-news.php" style="margin-top: 10px;" onsubmit="return confirmDelete();">';
        echo '<input type="hidden" name="news_id" value="' . $row['id'] . '">';
        echo '<button type="submit" class="delete-button">Delete</button>';
        echo '</form>'; }
    
    echo '<p id="viewCount_' . $row['id'] . '" style="margin-top: 20px;font-size: 17px;">Date Published: ' . $row['date_published'] . ' | Views: ' . $row['view_count'] . '</p>';
    echo '</div>';
}

$query->close();

$totalNews = $db->query("SELECT COUNT(id) AS total FROM tbl_news")->fetch_assoc()['total'];

$totalPages = ceil($totalNews / $newsPerPage);


echo '<div class="pagination">';
echo '<a class="arrow-link" href="?page=' . max(1, $currentPage - 1) . '">&#8249;</a>';
for ($i = 1; $i <= $totalPages; $i++) {
    $class = ($i == $currentPage) ? 'current-page' : '';
    echo '<a class="page-link ' . $class . '" href="?page=' . $i . '">' . $i . '</a>';
}
echo '<a class="arrow-link" href="?page=' . min($totalPages, $currentPage + 1) . '">&#8250;</a>';
echo '</div>';
?>




<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this news article?");
    }
</script>



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