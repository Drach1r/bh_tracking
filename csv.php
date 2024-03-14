<?php
include 'includes/header.php';
?>

<h3 style="margin-left: 30px;">Records List </h3>

<form action="import.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".csv">
        <button type="submit" name="submit">Upload CSV</button>
    </form>

<div class="container">
    <br>
    <div class="card-body">
        <div class="card-title-body">
            <script>
                $(document).ready(function() {
                    var table = $('#recordstable').DataTable({
                        'pageLength': 10,
                        'scrollY': '40vh',
                        columnDefs: [{
                                width: '10%',
                                targets: 1
                            },
                            {
                                width: '10%',
                                targets: 3
                            },
                        ]
                    });
                });
            </script>

<<<<<<< Updated upstream
            <table class="table table-bordered table-hover w-100" id="recordstable">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Account Number</th>
                        <th class="text-center">Name of Establishment</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">City Municipality</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "bh_tracking";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql = "SELECT id, account_number, establishment_name, first_name, middle_name, last_name, bh_address, bh_municipality FROM boarding_house_tracking";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
=======
                <div class="col-sm-6">
                    <br>
                    <h3 class="title" style="margin-left: 50px;">Records List </h3>

                    <form action="import_csv.php" method="post" enctype="multipart/form-data" style="margin-left: 50px;">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                                <label for="file" class="col-form-label">Choose CSV file to import:</label>
                            </div>
                            <div class="col-auto">
                                <input type="file" class="form-control-file" id="file" name="file">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-sm rounded-s">Import</button>
                            </div>
                        </div>
                    </form>
>>>>>>> Stashed changes

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $row['account_number'] . "</td>";
                                echo "<td class='text-center'>" . $row['establishment_name'] . "</td>";
                                echo "<td class='text-center'>" . $row['first_name'] . " " . $row['middle_name'] . " " . $row['last_name'] . "</td>";
                                echo "<td class='text-center'>" . $row['bh_address'] . "</td>";
                                echo "<td class='text-center'>" . $row['bh_municipality'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Connection failed: " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<<<<<<< Updated upstream
</div>
=======
    <br>


    <section class="section">
        <dive class="row">


            <div class="card col-lg-11" style="margin-left: 60px;">

                <div class="card-body">
                    <div class="card-body">
                        <br>
                        <div class="card-title-body">




                            <script>
                                $(document).ready(function() {
                                    var table = $('#recordstable').DataTable({
                                        'pageLength': 10,
                                        'scrollY': '40vh',
                                        columnDefs: [{
                                                width: '10%',
                                                targets: 1
                                            },
                                            {
                                                width: '10%',
                                                targets: 3
                                            },
                                        ]
                                    });

                                    $('.nav-link').click(function() {
                                        table.columns.adjust().draw();

                                    });


                                });
                            </script>
                            <style type="text/css">
                                table tbody tr:hover {
                                    cursor: pointer;
                                }

                                .normalTr:hover {
                                    cursor: default;
                                }
                            </style>

                            <table class="table table-bordered table-hover w-100" id="recordstable">
                                <thead class="table-dark">
                                    <tr>
                                      
                                        <th class="text-center">Account Number</th>
                                        <th class="text-center">Name of Establishment</th>
                                        <th class="text-center">Full Name</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">City Municipality</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $database = "bh_tracking";

                                    try {

                                        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                        $sql = "SELECT id, account_number, establishment_name, first_name, middle_name, last_name, bh_address, bh_municipality FROM boarding_house_tracking";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();


                                        if ($stmt->rowCount() > 0) {

                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<tr>";
                                                echo "<td class='text-center'>" . $row['account_number'] . "</td>";
                                                echo "<td class='text-center'>" . $row['establishment_name'] . "</td>";
                                                echo "<td class='text-center'>" . $row['first_name'. 'middle_name'. 'last_name'.'suffix'] . "</td>";
                                                echo "<td class='text-center'>" . $row['bh_address'] . "</td>";
                                                echo "<td class='text-center'>" . $row['bh_municipality'] . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                                        }
                                    } catch (PDOException $e) {

                                        echo "Connection failed: " . $e->getMessage();
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </dive>
    </section>
</article>

>>>>>>> Stashed changes

<?php
include 'includes/footer.php';
?>
