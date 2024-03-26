<?php
// fetch_data.php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

// Retrieve the selected date from the POST request
$selectedDate = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : null;

if (empty($selectedDate)) {
    // Handle the case when the selected date is empty
    echo json_encode(array('labels' => [], 'data' => [], 'districts' => []));
    exit();
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all data for the selected date without grouping
    $sql = "SELECT bh_district, bh_barangay, inspected_by FROM boarding_house_tracking WHERE DATE(submission_time) = :selectedDate";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':selectedDate', $selectedDate);
    $stmt->execute();


    // Fetch data and store it in arrays
    $labels = [];
    $data = [];
    $districts = []; // Store barangay and inspector data under each district
    $districtCounts = []; // Store district counts

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $labels[] = $row['bh_district'];
        $data[] = 1; // Since we're not counting, just set a dummy value
        $district = $row['bh_district'];
        $barangay = $row['bh_barangay'];
        $inspector = $row['inspected_by'];

        // Increment district count or set it to 1 if it doesn't exist
        if (isset($districtCounts[$district])) {
            $districtCounts[$district]++;
        } else {
            $districtCounts[$district] = 1;
        }

        // Add barangay and inspector data under each district
        if (!isset($districts[$district])) {
            $districts[$district] = [];
        }
        $districts[$district][$barangay] = $inspector; // No need for duplicate checking since we're fetching all data
    }

    // Prepare response data for pie chart
    $labels = array_keys($districtCounts);
    $data = array_values($districtCounts);

    // Prepare response data in JSON format
    $response = array(
        'labels' => $labels,
        'data' => $data,
        'districts' => $districts // Include districts data for the table
    );


    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Connection failed: ' . $e->getMessage()));
}
?>
