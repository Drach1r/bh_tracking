<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addform'])) {
    try {
        include '../../boot.php';



        $_SESSION['success'] = "Record inserted successfully";
        header("Location: ../../create.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
