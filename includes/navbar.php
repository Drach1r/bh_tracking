<?php

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->prepare('SELECT role FROM users WHERE id = :user_id');

try {
    $stmt->execute(['user_id' => $_SESSION['user_id']]);
    $user_role = $stmt->fetchColumn();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-s2NqIX+4ogvHzh0JqQLN73OY5hC+O4uvOs7BYpvL/gLP+B3r+Fu+6wUopE3PybLWpA2ZYsKOpYyDAxskpFL9CA==" crossorigin="anonymous" />


<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
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
    </style>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="records.php">
            <i class="fa fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

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

<?php if ($user_role === 'super_admin') : ?>
    <li class="nav-item">
        <a class="nav-link collapsed" href="user.php" aria-expanded="true">
            <i class="fa-solid fa-pen-to-square"></i>
            <span>Manage Profiles</span>
        </a>
    </li>
<?php endif; ?>


    <hr class="sidebar-divider d-none d-md-block">
</ul>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <ul class="navbar-nav ml-auto">
                <div class="topbar-divider d-none d-sm-block"></div>
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
