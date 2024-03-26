<?php
require_once('boot.php');

if (!isset($_SESSION['user_id'])) {

    header("Location: index.php");
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BH Tracking</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="icon" type="image/x-icon" href="resources/img/iloilo.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/compressorjs@1.1.5/dist/compressor.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">





</head>

<header>
    <style>
        nav {
            background-color: #f0c277;
        }



        h6 {
            top: 0px;
            right: 30px;
            /* Add some spacing */
            position: relative;
        }

        .topbar-divider.d-none {
            display: none;
            /* Hide divider on small screens */
        }

        .logout-link {
            color: white;
            /* Set logout link color */
            text-decoration: none;
            /* Remove underline */
            margin-left: 10px;
            /* Add spacing between divider and link */
        }

        .logout-link:hover {
            color: #ffc107;
            /* Change color on hover */
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-dark bg-red sticky-top">
        <div class="container-fluid">
            <a href="records.php"><img src="resources/img/iloilo.png" alt="" height="80"></a>
            <h5 style="color: black; font-weight: bold; margin-left: 20px;">Boarding House Tracking Information Management Application</h5>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">

                    <button class="btn btn-outline-success" type="submit">Search</button>
                </li>

                <li class="nav-item">

                    <a class="nav-link logout-link" href="logout.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h6 class="h6 mb-0 text-danger">Logout</h6>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="topbar-divider d-none d-sm-block"></div> <!-- Move the divider here -->
                </li>
            </ul>
        </div>
    </nav>


</header>

<body>

    <?php
    if (isset($_SESSION['error'])) {
        echo "<div class='alert alert-danger text-center'>
            <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
          </div>";

        // unset error
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo "<div class='alert alert-success text-center'>
            <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
          </div>";

        // unset success
        unset($_SESSION['success']);
    }
    ?>
    <br>