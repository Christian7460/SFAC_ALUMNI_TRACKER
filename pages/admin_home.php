<?php 
ob_start();
include "../includes/conn.php";
include "../includes/navbar.php";
include "../includes/scripts.php";
include '../includes/graph-data.php';
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
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <title>SFAC Alumni Tracker</title>
  <style>a { color: inherit; } </style>

  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../img/logo.png" alt="SFAC" height="400" width="400">
  </div>

  <!-- NAVBAR -->
  <!-- SIDEBAR -->
  <?php 
require "../includes/sidebar.php";
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

    <div class="container-fluid py-4">
    <!-- Dashboard Header -->
        <h2 class="mb-1">Analytics</h2>
        <div class="row">
            <div class="col-lg-6 mt-4 mt-lg-0 ">
              <div class="card mb-5">
                <div class="card-header pb-0 p-3">
                  <div class="d-flex align-items-center">
                  <h6 class="mb-0">Analytics Insights (Per Department)</h6>

                  </div>
                </div>
        <div class="row">
        <div class="card-body p-3">
                <div class="row">
                  <div class="col-5 text-center">
                    <div class="chart">
                      <canvas id="chart-consumption2" class="chart-canvas" height="200"></canvas>
                    </div>
                    <h4 class="font-weight-bold mt-n8">
                      <span><?php echo $alumni_total; ?></span>
                      <span class="d-block text-body text-sm">ALUMNI</span>
                    </h4>
                    </div>
                <div class="col-7">
                  <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <tbody>
                      <tr>
                      <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-primary me-3"> </span>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">CS Department</h6>
                  </div>
                </div>
                      </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs"> <?php echo $total_CS; ?> </span>
                </td>
                    </tr>
                <tr>
                <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-secondary me-3"> </span>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">BA Department</h6>
                  </div>
                </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs"><?php echo $total_BA; ?></span>
                </td>
                </tr>
                <tr>
                <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-info me-3"> </span>
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">EDUC Department</h6>
                </div>
                </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs"> <?php echo $total_EDUC; ?></span>
                </td>
                </tr>
                <tr>
                <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-success me-3"> </span>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">HM / HRM Department</h6>
                  </div>
                </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs"> <?php echo $total_HM; ?> </span>
                </td>
                </tr>

                <tr>
                      <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-warning me-3"> </span>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">LA Department</h6>
                  </div>
                </div>
                      </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs"><?php echo $total_LA; ?></span>
                </td>
                    </tr>
                    <tr>
                      <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-dark me-3"> </span>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">ENG Department</h6>
                  </div>
                </div>
                      </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs"><?php echo $total_ENG; ?></span>
                </td>
                    </tr>
                    <tr>
                      <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-danger me-3" > </span>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">NURS Department</h6>
                  </div>
                </div>
                      </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs"><?php echo $total_NURS; ?></span>
                </td>
                    </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        </div>

        <div class="col-lg-6 mt-4 mt-lg-0 ">
              <div class="card mb-5">
                <div class="card-header pb-0  p-3">
                <div class="d-flex align-items-center">
                <h6 class="mb-0">Analytics Insights (Work Status)</h6>

              </div>
            </div>
        <div class="row">
        <div class="card-body p-3 ">
            <div class="row">
              <div class="col-5 text-center">
                <div class="chart">
                  <canvas id="chart-consumption" class="chart-canvas" height="197"></canvas>
                </div>
                  <h4 class="font-weight-bold mt-n8">
                    <span><?php echo $alumni_total; ?></span>
                  <span class="d-block text-body text-sm">ALUMNI</span>
                  </h4>
              </div>
          <div class="col-7">
            <div class="table-responsive">
            <table class="table align-items-center mb-0">
            <tbody>
              <tr>
                <td>
                  <div class="d-flex px-2 py-0">
                    <span class="badge bg-gradient-primary me-3"> </span>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">Full-time</h6>
                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="text-xs"><?php echo $total_ft; ?></span>
                </td>
              </tr>
              <tr>
              <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-secondary me-3"> </span>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Part-time</h6>
                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs"><?php echo $total_pt; ?></span>
              </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex px-2 py-0">
                    <span class="badge bg-gradient-info me-3"> </span>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">Self-employed</h6>
                    </div>
                  </div>
                </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs"> <?php echo $total_se; ?> </span>
              </td>
              </tr>
              <tr>
              <td>
                <div class="d-flex px-2 py-0">
                  <span class="badge bg-gradient-warning me-3"> </span>
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">Unemployed</h6>
                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs"><?php echo $total_ue; ?></span>
              </td>
              </tr>
              <td>
                <div class="d-flex px-2 py-0">

                  </div>
                </div>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="text-xs"> <?php echo $alumni_total; ?> </span>
              </td>
              </tr>
                  <td>
                    <div class="d-flex px-2 py-4">
                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                  </td>
                  </tr>

            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

        </div>
        <div class="row">
    <div class="col-lg-4 col-md-2 mt-2 mb-5 mx-auto">
        <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg border-radius-lg py-3 pe-1" style="background: #b5cbff;">
                    <div class="chart">
                        <canvas id="chart-bars2" class="chart-canvas" style="display: block; box-sizing: border-box; width: 268.7px;" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0">Job Alignment Analytics</h6>
                <p id="percentageDisplay" class="text-sm"></p>
                <hr class="dark horizontal">
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-2 mt-2 mb-5 mx-auto">
        <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="bg border-radius-lg py-3 pe-1" style="background: #FFFAAB;">
                    <div class="chart">
                        <canvas id="chart-bars" class="chart-canvas" style="display: block; box-sizing: border-box; width: 268.7px;" height="150"></canvas>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="mb-0">Satisfactory Ratings</h6>
                <p id="meanDisplay" class="text-sm"></p>
                <hr class="dark horizontal">
            </div>
        </div>
    </div>
</div>
        
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-2 col-6">
            <!-- small box -->
            
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <?php
                    $alumni_query = "SELECT alumni_id from tbl_form";
                        $user_query_run = mysqli_query($db, $alumni_query);

                        if ($user_total = mysqli_num_rows($user_query_run)) {
                            echo '<h4 class="mb-0">' . $user_total . '</h4>';
                        } else {
                            echo '<h4 class="mb-0">0</h4>';
                        }
                  ?>
                  <br>

                <p>Total Alumni</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">See More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
                   <!-- ./col -->
                   <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
                   <!-- ./col -->
                   <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          

                   <!-- ./col -->
                   <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

                   <!-- ./col -->
                   <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

                   <!-- ./col -->
                   <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-gradient-danger">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
              <i class="nav-icon fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->      
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
  <!-- </aside> -->
  <!-- /.control-sidebar -->
</div><?php 
include "../includes/footer.php";
?>
<!-- ./wrapper -->

</body>
</html>
<?php }else{
    header("Location:index.php");
} ?>