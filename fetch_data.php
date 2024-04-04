<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

$selectedDate = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : null;

if (empty($selectedDate)) {
    echo json_encode(array('labels' => [], 'data' => [], 'districts' => []));
    exit();
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT bd.district_name AS district, ba.barangay AS barangay, inspected_by
FROM boarding_house_tracking bht
INNER JOIN bh_district bd ON bht.bh_district = bd.id
INNER JOIN bh_address ba ON bht.bh_barangay = ba.id
WHERE DATE(bht.submission_time) = :selectedDate";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':selectedDate', $selectedDate);
$stmt->execute();

$labels = [];
$data = [];
$districts = [];
$districtCounts = []; 

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
$labels[] = $row['barangay']; 
$data[] = 1; 
$district = $row['district'];
$barangay = $row['barangay'];
$inspector = $row['inspected_by'];

if (isset($districtCounts[$district])) {
$districtCounts[$district]++;
} else {
$districtCounts[$district] = 1;
}

if (!isset($districts[$district])) {
$districts[$district] = [];
}
$districts[$district][$barangay] = $inspector; 
}


    $labels = array_keys($districtCounts);
    $data = array_values($districtCounts);

    $response = array(
        'labels' => $labels,
        'data' => $data,
        'districts' => $districts 
    );

    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Connection failed: ' . $e->getMessage()));
}
?>
