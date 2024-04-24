<?php
require_once('includes/boot.php');

if (isset($_POST['user_id'])) {
    $id = $_POST['user_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $deletedRows = $stmt->rowCount();

        $pdo->exec("ALTER TABLE users AUTO_INCREMENT = 1");

        header("Location: user.php");
        exit();
    } catch (PDOException $e) {

        http_response_code(500);
        echo json_encode(array('message' => 'Failed to delete records.', 'error' => $e->getMessage()));
    }
} else {
    http_response_code(400);
    echo json_encode(array('message' => 'No ID provided.'));
}
