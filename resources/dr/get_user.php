<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT id, first_name, last_name, email, role FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();


        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($user);
    } else {
        echo "User ID not provided.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


$conn = null;
