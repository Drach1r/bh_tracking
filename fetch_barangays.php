<?php
require_once('includes/boot.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['district_id'])) {
    $districtId = $_GET['district_id'];

    try {


        $query = "SELECT id, barangay FROM bh_address WHERE district_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$districtId]);
        $barangays = $stmt->fetchAll(PDO::FETCH_ASSOC);


        echo json_encode($barangays);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
