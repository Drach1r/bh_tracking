<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["submit"])) {
        // Check if file is uploaded successfully
        if($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
            $file = $_FILES["file"]["tmp_name"];
            $handle = fopen($file, "r");

            // Loop through each row in the CSV file
            while(($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                // Prepare SQL statement for insertion
                $stmt = $conn->prepare("INSERT INTO boarding_house_tracking (id, bh_start, bh_end, ...) VALUES (?, ?, ?, ...)");
                // Bind parameters
                $stmt->bindParam(1, $data[0]);
                $stmt->bindParam(2, $data[1]);
                $stmt->bindParam(3, $data[2]);
                // Add more bindParam for each column in your CSV file
                // Execute the statement
                $stmt->execute();
            }

            fclose($handle);
            echo "CSV file imported successfully.";
        } else {
            echo "Error uploading CSV file.";
        }
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
