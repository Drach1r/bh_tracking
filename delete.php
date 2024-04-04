<?php
require_once('includes/boot.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("DELETE FROM boarding_house_tracking WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $deletedRows = $stmt->rowCount();

        // Reset AUTO_INCREMENT values
        $pdo->exec("ALTER TABLE boarding_house_tracking AUTO_INCREMENT = 1");

        $pdo->commit();
    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        $pdo->rollBack();

        // Send an error response
        http_response_code(500);
        echo json_encode(array('message' => 'Failed to delete records.', 'error' => $e->getMessage()));
    }
} else {
    // Send a bad request response if no ID is provided
    http_response_code(400);
    echo json_encode(array('message' => 'No ID provided.'));
}
