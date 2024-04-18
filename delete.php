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


        $pdo->exec("ALTER TABLE boarding_house_tracking AUTO_INCREMENT = 1");

        $pdo->commit();
    } catch (PDOException $e) {

        $pdo->rollBack();

        http_response_code(500);
        echo json_encode(array('message' => 'Failed to delete records.', 'error' => $e->getMessage()));
    }
} else {

    http_response_code(400);
    echo json_encode(array('message' => 'No ID provided.'));
}
