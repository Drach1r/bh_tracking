<?php
include 'includes/header.php';
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container">
    <div class="card-title-body">
        <script>
           $(document).ready(function () {
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

    $('.nav-link').click(function () {
        table.columns.adjust().draw();
    });

    $(document).ready(function () {
        var today = new Date().toISOString().slice(0, 10);
        $('#filterDate').val(today);
        filterPieChart(today);

        $('#filterDate').change(function () {
            var selectedDate = $(this).val();
            filterPieChart(selectedDate);
        });
    });
    $('#filterDate').change(function () {
        var selectedDate = $(this).val();
        filterPieChart(selectedDate);
    });

    var myChart = null; // Store the chart instance

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
                    myChart.destroy(); // Destroy previous chart instance
                }
                if (response.labels.length > 0) {
                    updatePieChart(response.labels, response.data);
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

    // Update the table with filtered data
    var tableBody = $('#filteredDataTable tbody');
    tableBody.empty(); // Clear previous data

    for (var district in districts) {
        if (districts.hasOwnProperty(district)) {
            // Append rows for each barangay under the district
            for (var barangay in districts[district]) {
                if (districts[district].hasOwnProperty(barangay)) {
                    var inspector = districts[district][barangay];

                    // Append a row with district, barangay, and inspector
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

// Assuming the rest of your code remains the same...


    function updateTableData(districts) {
        var tableBody = $('#filteredDataTable tbody');
        tableBody.empty(); // Clear previous data

        for (var district in districts) {
            if (districts.hasOwnProperty(district)) {
                // Append rows for each barangay under the district
                for (var barangay in districts[district]) {
                    if (districts[district].hasOwnProperty(barangay)) {
                        var inspector = districts[district][barangay];

                        // Append a row with district, barangay, and inspector
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

        <table class="table table-bordered" id="recordstable">
            <thead>
                <tr>
                    <th class="text-center" style="background-color:#f0c277; color: black;">Date</th>
                    <th class="text-center" style="background-color:#f0c277; color: black;">District</th>
                    <th class="text-center" style="background-color:#f0c277; color: black;">Barangay</th>
                    <th class="text-center" style="background-color:#f0c277; color: black;">Inspector</th>
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
    </div>


<br>
<br>

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
                    <th class="text-center" style="background-color:#f0c277; color: black;">District</th>
                    <th class="text-center" style="background-color:#f0c277; color: black;">Barangay</th>
                    <th class="text-center" style="background-color:#f0c277; color: black;">Inspector</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- This will be populated dynamically -->
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
include 'includes/footer.php';
?>