<?php
include 'includes/boot.php';

function importCSV($filename, $pdo)
{
    $file = fopen($filename, "r");

    fgetcsv($file);

    $stmt = $pdo->prepare("INSERT INTO bh_address (`district`, `barangay`) VALUES (?, ?)");

    while (($data = fgetcsv($file)) !== FALSE) {
        $stmt->execute([$data[0], $data[1]]);
        echo "New record created successfully<br>";
    }

    fclose($file);
}


if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    $file_name = $_FILES["file"]["tmp_name"];
    importCSV($file_name, $pdo);
    echo "Import successful!";
    header("Location: records.php"); 
    exit();
} else {
    echo "Error: Please select a file to import.";
}
