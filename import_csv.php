<?php
include 'includes/boot.php';


function importCSV($filename, $conn)
{
    $file = fopen($filename, "r");

    fgetcsv($file);

    $stmt = $conn->prepare("INSERT INTO boarding_house_tracking (column1, column2, column3) VALUES (?, ?, ?)");

    while (($data = fgetcsv($file)) !== FALSE) {
        $stmt->execute([$data[0], $data[1], $data[2]]);
        echo "New record created successfully<br>";
    }

    fclose($file);
}


if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
    $file_name = $_FILES["file"]["tmp_name"];
    importCSV($file_name, $conn);
    echo "Import successful!";
} else {
    echo "Error: Please select a file to import.";
}
