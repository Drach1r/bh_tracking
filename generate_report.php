<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<br>
<div class="container">


    <section class="example">

        <div class="d-flex justify-content-center">
            <table class="table table-bordered" id="recordstable">
                <thead>
                    <tr>
                    <th class="text-center" style="color: black; background-color:#f0a190">Date</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">District</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">Barangay</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">Inspector</th>
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

                    $sql = "SELECT submission_time, bh_district, bh_barangay, inspected_by FROM boarding_house_tracking";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $row['submission_time'] . "</td>";
                            echo "<td class='text-center'>" . $row['bh_district'] . "</td>";
                            echo "<td class='text-center'>" . $row['bh_barangay'] . "</td>";
                            echo "<td class='text-center'>" . $row['inspected_by'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
                    }
                } catch (PDOException $e) {
                    echo "Connection failed: " . $e->getMessage();
                }
                ?>

                </tbody>
            </table>

    </section>
</div>
<br>
<div class="container">

<label for="filterDate">Filter by Date:</label>

    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <input type="date" class="form-control" id="filterDate">
        </div>
        <canvas id="districtPieChart" width="200" height="200"></canvas>
    </div>
    <div class="col-md-6">
        <div class="table-container">
            <table class="table table-bordered" id="filteredDataTable">
                <thead>
                    <tr>
                    <th class="text-center" style="color: black; background-color:#f0a190">District</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">Barangay</th>
                    <th class="text-center" style="color: black; background-color:#f0a190">Inspector</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
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
   
    var today = new Date().toISOString().slice(0, 10);
        $('#filterDate').val(today);
        filterPieChart(today);

        $('#filterDate').change(function () {
            var selectedDate = $(this).val();
            filterPieChart(selectedDate);
        });

        function filterPieChart(selectedDate) {
            $.ajax({
                url: 'fetch_data.php',
                type: 'POST',
                data: {
                    selectedDate: selectedDate
                },
                dataType: 'json',
                success: function (response) {
                    if (myChart) {
                        myChart.destroy();
                    }
                    if (response.labels.length > 0) {
                        updatePieChart(response.labels, response.data, response.districts);
                        updateTableData(response.districts);
                    } else {
                        updatePieChart(['No data available'], [0]);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        var myChart = null;

        function updatePieChart(labels, data, districts) {
            var ctx = document.getElementById('districtPieChart').getContext('2d');
            myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(255, 0, 0, 0.8)',
                            'rgba(0, 255, 0, 0.8)',
                            'rgba(0, 0, 255, 0.8)',
                            'rgba(255, 255, 0, 0.8)',
                            'rgba(255, 0, 255, 0.8)',
                            'rgba(0, 255, 255, 0.8)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Inspections Per District',
                        fontSize: 18
                    }
                }
            });
        }

        function updateTableData(districts) {
            var tableBody = $('#filteredDataTable tbody');
            tableBody.empty();

            for (var district in districts) {
                if (districts.hasOwnProperty(district)) {
                    for (var barangay in districts[district]) {
                        if (districts[district].hasOwnProperty(barangay)) {
                            var inspector = districts[district][barangay];

                            var row = '<tr>';
                            row += '<td>' + district + '</td>';
                            row += '<td>' + barangay + '</td>';
                            row += '<td>' + inspector + '</td>';
                            row += '</tr>';

                            tableBody.append(row);
                        }
                    }
                }
            }
        }

    });

</script>






<?php
include 'includes/footer.php';
?>