<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

$selectedDate = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : null;

if (empty($selectedDate)) {
    echo json_encode(array('labels' => [], 'data' => [], 'barangay' => []));
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

    $barangayCounts = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $district = $row['district'];
        $barangay = $row['barangay'];
        $inspector = $row['inspected_by'];

        if (isset($barangayCounts[$barangay])) {
            $barangayCounts[$barangay][] = array('district' => $district, 'inspector' => $inspector);
        } else {
            $barangayCounts[$barangay] = array(array('district' => $district, 'inspector' => $inspector));
        }
    }

    $labels = array_keys($barangayCounts);
    $data = array_values(array_map('count', $barangayCounts));

    $response = array(
        'labels' => $labels,
        'data' => $data,
        'barangay' => $barangayCounts
    );

    header('Content-Type: application/json');
    echo json_encode($response);
} catch (PDOException $e) {
    echo json_encode(array('error' => 'Connection failed: ' . $e->getMessage()));
}
?>
