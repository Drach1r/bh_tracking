<?php
include 'includes/boot.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="resources/style.css">
<br>

<style>
    body {
        background-image: url('resources/img/cityhall.jpg');
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
        padding: 0;
    }

    .container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        width: 600px;
        backdrop-filter: blur(10px);
        /* Add blur effect */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        /* Add shadow effect */
        border: none;
        /* Remove border */
    }
</style>

<div class="container">
    <?php
    if (isset($_SESSION['error'])) {
        echo "
                    <div class='alert alert-danger text-center'>
                        <i class='fas fa-exclamation-triangle'></i> " . $_SESSION['error'] . "
                    </div>
                ";

        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo "
                    <div class='alert alert-success text-center'>
                        <i class='fas fa-check-circle'></i> " . $_SESSION['success'] . "
                    </div>
                ";

        unset($_SESSION['success']);
    }
    ?>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center text-danger">Register a new account</h5>
            <form method="POST" action="code.php">
                <div class="mb-3 row">
                    <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                    <input class="form-control" type="text" id="first_name" name="first_name" value="<?php echo (isset($_SESSION['first_name'])) ? $_SESSION['first_name'] : '';
                                                                                                        unset($_SESSION['first_name']) ?>" placeholder="Enter first name" required>
                </div>

                <div class="mb-3 row">
                    <label for="last_name" class="col-sm-3 col-form-label">Last Name</label>
                    <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo (isset($_SESSION['last_name'])) ? $_SESSION['last_name'] : '';
                                                                                                    unset($_SESSION['last_name']) ?>" placeholder="Enter last name" required>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <input class="form-control" type="email" id="email" name="email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '';
                                                                                            unset($_SESSION['email']) ?>" placeholder="Enter email" required>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <input class="form-control" type="password" id="password" name="password" value="<?php echo (isset($_SESSION['password'])) ? $_SESSION['password'] : '';
                                                                                                        unset($_SESSION['password']) ?>" placeholder="Enter password" required>
                </div>

                <div class="form-group row">
                    <label for="confirm" class="col-sm-6 col-form-label">Confirm Password</label>
                    <input class="form-control" type="password" id="confirm" name="confirm" value="<?php echo (isset($_SESSION['confirm'])) ? $_SESSION['confirm'] : '';
                                                                                                    unset($_SESSION['confirm']) ?>" placeholder="Re-type password">
                </div>

                <hr>
                <div>
                    <button type="submit" class="btn btn-primary" name="register"><i class="far fa-user"></i> Sign Up</button>
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include 'includes/footer.php';
?>