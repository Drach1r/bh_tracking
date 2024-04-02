<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bh_tracking";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT 
    bht.*, 
    bd.district_name AS district_name,
    ba.barangay AS barangay_name
FROM 
    boarding_house_tracking bht
LEFT JOIN 
    bh_district bd ON bht.bh_district = bd.id
LEFT JOIN 
    bh_address ba ON bht.bh_barangay = ba.id;
";


    $stmt = $pdo->query($sql);

    $locations = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $locations[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($locations);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
