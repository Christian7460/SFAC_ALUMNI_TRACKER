<?php 
include 'conn.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<!-- Main Sidebar Container -->
<br>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../pages/admin_home.php" class="brand-link">
      <img src="../img/logo.png" alt="SFAC" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SFAC Alumni Tracker</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php 
    $getImg = mysqli_query($db, "SELECT img FROM tbl_admin WHERE ad_id = '".$_SESSION['userid']."' ");
    while ($row = mysqli_fetch_array($getImg)) {
        if (empty($row['img'])) {
            echo '<img class="avatar" style="height:35px; width:35px;" src="../../img/image.png" />';
        } else {
            echo '<img class="avatar" style="height:35px; width:35px;" src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" />';
        }
    }
?>

        </div>
        <div class="info">
          <a href="./pages/edit_admin.php" class="d-block"><?php { 
           if($_SESSION['role'] == "Admin"){
            $user = mysqli_query($db,"SELECT * from tbl_admin where ad_id = '".$_SESSION['userid']."' ");
            while($row = mysqli_fetch_array($user)){
                $_SESSION['user'] = $row['lastname'];
                echo $row['firstname']." ". $row['lastname'];
            }
        }
                } ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
     
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" >
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../pages/admin_home.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../pages/admin/add_admin.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Add Admin
              </p>
            </a>
          </li>
          
          <li class="nav-item ">
            <a href=" pages/news/news-display.php" class="nav-link" >
              <i class="nav-icon fas fa-bell"></i>
              <p>
                News Updates
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Pending Job Offers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Job Opportunities
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-coffee"></i>
              <p>
                Discussion Forum
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-check"></i>
              <p>
                Feedbacks
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Add Accounts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../pages/add_account/add_registrar.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Add Registrar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/add_account/add_alumni.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Add Alumni</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../pages/add_account/add_alumni.php" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>Add Student</p>
                </a>
              </li>
              
            </ul>
          </li>

          <!-- ==================================================================== -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Account Lists
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Registrar Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Alumni Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Student Lists</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- ====================================================================== -->



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Others
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Add Batch</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="nav-icon fas fa-redo"></i>
                  <p>Batch Transition</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Alumni Form Lists</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>Add Job Form</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="nav-icon fas fa-indent"></i>
                  <p>Add News</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link">
                  <i class="nav-icon fas fa-heart"></i>
                  <p>Donation</p>
                </a>
              </li>
            </ul>
          </li>



<!-- ======================================================================================== -->


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <?php
if($_SESSION['role'] == "Admin"){
      echo '
      ';}
      
  elseif($_SESSION['role'] == "Student"){
    echo '
    
';} 
    else{
      header("Location:../functions/404.php");
  } ?>
  
</body>
</html>