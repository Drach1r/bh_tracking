<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

// Retrieve the selected date from the POST request
$selectedDate = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : null;

if (empty($selectedDate)) {
    // Handle the case when the selected date is empty
    echo json_encode(array('labels' => [], 'data' => []));
    exit();
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL query to fetch data for the selected date
    $sql = "SELECT bh_district, COUNT(*) AS num_inspections FROM boarding_house_tracking WHERE DATE(submission_time) = :selectedDate GROUP BY bh_district";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':selectedDate', $selectedDate);
    $stmt->execute();

    // Fetch data and store it in arrays
    $labels = [];
    $data = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $labels[] = $row['bh_district'];
        $data[] = $row['num_inspections'];
    }

    // Prepare response data in JSON format
    $response = array(
        'labels' => $labels,
        'data' => $data
    );

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

