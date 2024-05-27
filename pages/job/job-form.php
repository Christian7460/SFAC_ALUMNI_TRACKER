<?php
include "../../includes/conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $job_name = $_POST['job_name'];
    $job_desc = $_POST['job_desc'];
    $edu_background = $_POST['edu_background'];

    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d H:i:s A");

    $sql = "INSERT INTO tbl_job (name, email, contact, job_name, job_desc, edu_background, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    $stmt->bind_param("sssssss", $name, $email, $contact, $job_name, $job_desc, $edu_background, $date);

    if ($stmt->execute()) {
        $_SESSION['job_added'] = 'Job Submitted Successfully!';
        header("Location: job-form.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $stmt->close();
}

include "../../includes/navbar.php";
include "../../includes/scripts.php";
include "../../includes/sidebar.php";

if (!empty($_SESSION['role'])) {
    if ($_SESSION['role'] == "Super Administrator") {
        $admin_id = $_SESSION['userid'];
        $query_admin = $db->query("SELECT admin_id, img, firstname, email FROM tbl_super_ad WHERE admin_id = '$admin_id'");
        $row_admin = $query_admin->fetch_array();
        $user_image = $row_admin['img'];
        $user_name = $row_admin['firstname'];
        $email = $row_admin['email'];
    } elseif ($_SESSION['role'] === "Admin") {
        $ad_id = $_SESSION['userid'];
        $query_stud = $db->query("SELECT ad_id, img, username, email FROM tbl_admin WHERE ad_id = '$ad_id'");
        $row_stud = $query_stud->fetch_array();
        $user_image = $row_stud['img'];
        $user_name = $row_stud['username'];
        $email = $row_stud['email'];
    } elseif ($_SESSION['role'] === "Registrar") {
        $reg_id = $_SESSION['userid'];
        $query_stud = $db->query("SELECT reg_id, img, username, email FROM tbl_registrar WHERE reg_id = '$reg_id'");
        $row_stud = $query_stud->fetch_array();
        $user_image = $row_stud['img'];
        $user_name = $row_stud['username'];
        $email = $row_stud['email'];
    } elseif ($_SESSION['role'] === "Student") {
        $student_id = $_SESSION['userid'];
        $query_stud = $db->query("SELECT student_id, img, username, email, batch_id FROM tbl_student WHERE student_id = '$student_id'");
        $row_stud = $query_stud->fetch_array();
        $user_image = $row_stud['img'];
        $user_name = $row_stud['username'];
        $email = $row_stud['email'];
        $batch_id = $row_stud['batch_id'];
    } elseif ($_SESSION['role'] === "Alum Stud") {
        $alumni_id = $_SESSION['userid'];
        $query_stud = $db->query("SELECT a.img, a.username, a.firstname, a.middlename, a.lastname, f.level_id, f.batch_id, f.program_id, f.email FROM tbl_alumni a LEFT JOIN tbl_form f USING(alumni_id) WHERE alumni_id = '$alumni_id'");
        $row_stud = $query_stud->fetch_array();
        $user_image = $row_stud['img'];
        $user_name = $row_stud['username'];
        $firstname = $row_stud['firstname'];
        $middlename = $row_stud['middlename'];
        $lastname = $row_stud['lastname'];
        $level_id = $row_stud['level_id'];
        $batch_id = $row_stud['batch_id'];
        $program_id = $row_stud['program_id'];
        $email = $row_stud['email'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SFAC Alumni Tracker</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
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
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../img/logo.png" alt="SFAC" height="400" width="400">
  </div>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Job Opportunity Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
<center>
    <section class="content">
      <div class="container-fluid">
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-9 mt-3">
                <div class="card">
                    <div class="card-body p-5">
                        <h3 class="text-center mb-4" style="font-family: sans-serif;">Job Opportunity Form</h3>
                        <form id="jobForm" method="post" action="">
                            <div class="mb-3">
                                <label for="name" class="form-label" style="color: black;">Name:</label>
                                <label class="text-bold ms-1 ps-1" style="color: black;"><?= $user_name ?></label>
                                <input type="hidden" name="name" value="<?= $user_name ?>">
                                <label for="email" class="form-label" style="color: black; margin-left: 50%;">Email:</label>
                                <label class="text-bold ms-1 ps-1" style="color: black;"><?= $email ?></label>
                                <input type="hidden" name="email" value="<?= $email ?>">
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label" style="color: black;">Contact:</label>
                                <input type="number" class="form-control" style="border: 1px solid black; border-radius: 10px; color: black;" name="contact" placeholder="Enter contact number" required>
                            </div>
                            <div class="mb-3">
                                <label for="job_name" class="form-label" style="color: black;">Job Title:</label>
                                <input type="text" class="form-control" style="border: 1px solid black; border-radius: 10px; color: black;" name="job_name" placeholder="ex. Teacher, Doctor etc." required>
                            </div>
                            <div class="mb-3">
                                <label for="job_desc" class="form-label" style="color: black;">Job Description:</label>
                                <textarea class="form-control" name="job_desc" rows="8" style="resize:none; color: black;" required placeholder="Enter job description here, please include details on how the user will be able to apply regarding on the job offer you will post (ex. sending the applicant's resume on your email)..."></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edu_background" class="form-label" style="color: black;">Required Educational Background:</label>
                                <select class="form-select" name="edu_background" style="border: 1px solid black; border-radius: 10px; color: black; padding-left: 6px; width: 250px;" required>
                                    <option value="" selected disabled>Select Educational Background</option>
                                    <option value="None">None</option>
                                    <option value="Elementary Graduate">Elementary Graduate</option>
                                    <option value="Junior High School Graduate">Junior High School Graduate</option>
                                    <option value="Senior High School Graduate">Senior High School Graduate</option>
                                    <option value="College Graduate (Any Course)">College Graduate (Any Course)</option>
                                    <option value="CS Graduate">CS Graduate</option>
                                    <option value="EDUC Graduate">EDUC Graduate</option>
                                    <option value="BA Graduate">BA Graduate</option>
                                    <option value="HM/HRM Graduate">HM/HRM Graduate</option>
                                    <option value="LA Graduate">LA Graduate</option>
                                    <option value="ENG Graduate">ENG Graduate</option>
                                    <option value="NURS Graduate">NURS Graduate</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-dark mt-3" onclick="showConfirmDialog(event)">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function showConfirmDialog(event) {
        event.preventDefault();
        $('#confirmModal').modal('show');
    }
    function closeConfirmDialog() {
        $('#confirmModal').modal('hide');
    }
    function submitForm() {
        $('#jobForm').submit();
    }
</script>
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirm Submission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to submit this job offer?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="closeConfirmDialog()">Cancel</button>
                <button type="button" class="btn btn-info" onclick="submitForm()">Submit</button>
            </div>
        </div>
    </div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  <?php
  if (!empty($_SESSION['job_added'])) { ?>
    Swal.fire("Job", "Submitted Successfully", "success");
    <?php unset($_SESSION['job_added']); } ?>
</script>
<?php include "../../includes/footer.php"; ?>
</div>
</body>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
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
<!-- jQuery Knob Chart -->
<script src="../../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/moment/moment.min.js"></script>
<!-- daterangepicker -->
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>
</html>
<?php } else {
    header("Location:index.php");
    exit();
}
?>
