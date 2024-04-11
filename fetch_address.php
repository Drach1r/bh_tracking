<?php
require_once('includes/boot.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['districtId'])) {
    $districtId = $_POST['districtId'];

    try {
        $query = "SELECT id, barangay FROM bh_address WHERE district_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$districtId]);
        $barangays = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return the barangays as JSON
        echo json_encode($barangays);
    } catch (PDOException $e) {
        // Handle database connection error
        echo json_encode(array('error' => $e->getMessage()));
    }
} else {
    // District ID not provided in the request
    echo json_encode(array('error' => 'District ID is required.'));
}
