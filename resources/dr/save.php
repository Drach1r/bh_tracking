<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST[''])) {
    try {
        include '../../boot.php';

   

        $usarStmt = $pdo->prepare("INSERT INTO boarding_house_tracking (bh_start, bh_end, bh_today, bh_device_id, bh_audit, account_number, establishment_name) 
VALUES (:bh_start, :bh_end, :bh_today, :bh_device_id, :bh_audit, :account_number, :establishment_name)");

        $usarStmt->bindParam(':bh_start', $_POST['bh_start']);
        $usarStmt->bindParam(':bh_end', $_POST['bh_end']);
        $usarStmt->bindParam(':bh_today', $_POST['bh_today']);
        $usarStmt->bindParam(':bh_device_id', $_POST['bh_device_id']);
        $usarStmt->bindParam(':bh_audit', $_POST['bh_audit']);
        $usarStmt->bindParam(':account_number', $_POST['account_number']);
        $usarStmt->bindParam(':establishment_name', $_POST['establishment_name']);
      


        $usarStmt->execute();

  
        $_SESSION['success'] = "Record inserted successfully";
        header("Location: ../../index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
