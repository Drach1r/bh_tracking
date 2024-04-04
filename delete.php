<?php
require_once('includes/boot.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    try {
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("DELETE FROM boarding_house_tracking WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $deletedUsarRows = $stmt->rowCount();

        $pdo->commit();

        $pdo->exec("ALTER TABLE boarding_house_tracking` AUTO_INCREMENT = 1");
    } catch (PDOException $e) {
        $pdo->rollBack();
    }
} else {
    http_response_code(400);
}
