<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=bh_tracking', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_GET['district_id'])) {

        $query = "SELECT id, barangay FROM bh_address WHERE district_id = :district_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':district_id', $_GET['district_id']);
        $stmt->execute();


        $barangays = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($barangays);
    } else {

        echo json_encode(array('error' => 'District ID is not provided'));
    }
} catch (PDOException $e) {

    echo json_encode(array('error' => 'Database connection error: ' . $e->getMessage()));
}
