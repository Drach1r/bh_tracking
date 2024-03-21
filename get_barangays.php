<?php
// Include database connection
include 'includes/boot.php';

if (isset($_GET['district'])) {
    $district = $_GET['district'];
    $stmt = $pdo->prepare("SELECT id, barangay FROM bh_address WHERE district = ?");
    $stmt->execute([$district]);
    $barangays = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array
    echo json_encode($barangays);
} else {
    echo json_encode([]);
}
?>
