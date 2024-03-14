<?php
include 'header.php';
include 'delete.php';

?>



<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row form-group">

                <div class="col-sm-6">
                    <br>
                    <h3 class="title" style="margin-left: 50px;">Records List <a href="csv.php" class="btn btn-primary  btn-sm rounded-s">Export to CSV</a></h3>



                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>


    <section class="section">
        <dive class="row">


            <div class="alert alert-success alert-dismissible fade show" style="display: none; position: absolute; top: 0px; left: 50%; transform: translateX(-50%); border-radius: 10px;" role="alert">
                Data deleted successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="alert alert-warning alert-dismissible fade show deleteWarning" style="display: none;" role="alert">
                Error deleting record. Please try again later.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>x-www-form-urlencoded
                </button>
            </div>
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
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Location Type</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">View Details</th>
                                        <th class="text-center">Delete </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $database = "drrmo";

                                    try {

                                        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                                        $sql = "SELECT id, date, loc_type, incident_loc FROM usar";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->execute();


                                        if ($stmt->rowCount() > 0) {

                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<tr>";
                                                echo "<td class='text-center'>" . $row['date'] . "</td>";
                                                echo "<td class='text-center'>" . $row['loc_type'] . "</td>";
                                                echo "<td class='text-center'>" . $row['incident_loc'] . "</td>";
                                                echo "<td class='text-center'><a href='records.php?id=" . $row['id'] . "' class='btn btn-primary'>View</a></td>";
                                                echo "<td class='text-center'><button class='btn btn-danger' onclick='deleteRecord(" . $row['id'] . ")'>Delete</button></td>";
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

<script>
    function deleteRecord(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.querySelector('.deleteWarning').innerHTML = 'Data deleted successfully.';
                        document.querySelector('.deleteWarning').style.display = 'block';
                        setTimeout(function() {
                            window.location.reload();
                        }, 500);
                    } else {
                        var errorMessage = xhr.responseText.trim();
                        if (errorMessage) {
                            alert(errorMessage);
                        } else {
                            alert('Error deleting record. Please try again later.');
                        }
                    }
                }
            };
            xhr.open('POST', 'delete.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('id=' + id);
        }
    }
</script>