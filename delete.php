<?php
require_once('includes/boot.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $pdo->beginTransaction();

        // Delete records from the usar table
        $stmt = $pdo->prepare("DELETE FROM boarding_house_tracking WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $deletedUsarRows = $stmt->rowCount();

        $pdo->commit();

        // Reset AUTO_INCREMENT values
        $pdo->exec("ALTER TABLE boarding_house_tracking` AUTO_INCREMENT = 1");
    } catch (PDOException $e) {
        $pdo->rollBack();
    }
} else {
    http_response_code(400);
}
