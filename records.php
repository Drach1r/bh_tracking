<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<br>
<div class="container">
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


<form action="import_csv.php" method="post" enctype="multipart/form-data">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label for="file" class="col-form-label">Choose CSV file:</label>
            </div>
            <div class="col-auto">
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-success btn-sm rounded-s">Import</button>
            </div>
        </div>
    </form>


    <form action="import_image.php" method="post" enctype="multipart/form-data">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label for="file" class="col-form-label">Choose Image files:</label>
            </div>
            <div class="col-auto">
                <input type="file" class="form-control-file" id="file" name="file[]" multiple>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary btn-sm rounded-s">Import</button>
            </div>
        </div>
    </form>

    <section class="example">

        <div class="d-flex justify-content-center">
            <table class="table table-bordered" id="recordstable">
                <thead>
                    <tr>
                    <th class="text-center" style="color: black; background-color:#f0a190">#</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">Name of Establishment</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">Full Name</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">Address</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">City Municipality</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">Action</th>
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
            echo "<td class='text-center'>" . $row['id'] . "</td>";
            echo "<td class='text-center'>" . $row['establishment_name'] . "</td>";
            echo "<td class='text-center'>" . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];

            if (array_key_exists('suffix', $row) && $row['suffix'] !== null) {
                echo ' ' . $row['suffix'];
            }

            echo "</td>";



            echo "<td class='text-center'>" . $row['bh_address'] . "</td>";
            echo "<td class='text-center'>" . $row['bh_municipality'] . "</td>";

            echo "<td class='text-center'>
                    <a class='btn btn-primary btn-sm rounded-s' style='margin-bottom: 5px;' href='form.php?id=" . $row['id'] . "'>
                        View
                    </a>
                    <a class='btn btn-success btn-sm rounded-s' style='margin-bottom: 5px;' href='bh_edit.php?id=" . $row['id'] . "'>
                        Edit
                    </a>
                    <a class='btn btn-danger btn-sm rounded-s' style='margin-bottom: 5px;' onclick='deleteRecord(" . $row['id'] . ")'>
                        Delete
                    </a>
                </td>";



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

    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    #recordstable_wrapper {
        width: 100%;
    }
</style>

<script>
    $(document).ready(function () {
        $('#recordstable').DataTable({
            "scrollY": "300px" 
        });
    });


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


<?php
include 'includes/footer.php';
?>