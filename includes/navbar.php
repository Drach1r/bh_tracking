<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="records.php">
    <div class="sidebar-brand-icon rotate-n-0">

      <img class="img-profile rounded-circle" src="resources/img/iloilo.png">
    </div>
    <div class="sidebar-brand-text mx-1" style="font-size: 0.8rem;">
    BH Tracking <span> Information Management </span>
</div>

  </a>



  <style>
    .img-profile {
      height: 70px;
      width: 70px;
    }



    .navbar-nav.sidebar.sidebar-dark.accordion {
      background-color: brown;
    }


    

    @media print {

/* Hide navigation bars when printing */
.navbar-nav {
  display: none;
}


table,
table * {
  visibility: visible;
}

table {
  position: absolute;
  top: 100px;
  left: 0;
}

h5{
  font-family: 'Times New Roman', Times, serif;
  align-items: center;
  font-size: 28px;
  text-align: center;
}
    }

  </style>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="records.php">
      <i class="fa fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">


  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="create.php" aria-expanded="true">
    <i class="fa fa-file"></i>
      <span>Add New Record</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="generate_report.php" aria-expanded="true">
      <i class="fa-solid fa-circle-plus"></i>
      <span>Generate Report</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="map.php" aria-expanded="true">
    <i class="fa-solid fa-pen-to-square"></i>
          <span>Mapping</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="user.php" aria-expanded="true">
    <i class="fa-regular fa-folder-open"></i>
          <span>Manage Profile</span>
    </a>
  </li>
  


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

     




      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">




        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="logout.php" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
    <h3 class="h6 mb-0 text-danger">Logout</h3>

          </a>
        
          
        </li>

      </ul>

    </nav>
    <?php
if (isset($_SESSION['error'])) {
    echo "<div class='alert alert-danger text-center'>
            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
          </div>";

    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo "<div class='alert alert-success text-center'>
            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
          </div>";

    unset($_SESSION['success']);
}
?>

      