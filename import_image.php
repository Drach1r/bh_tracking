<?php
include 'includes/boot.php';

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "bh_tracking"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES['file'])) {
            $file_count = count($_FILES['file']['name']);

            for ($i = 0; $i < $file_count; $i++) {
                $file_name = $_FILES['file']['name'][$i];
                $file_tmp = $_FILES['file']['tmp_name'][$i];

                if (file_exists("resources/gallery/" . $file_name)) {
                    unlink("resources/gallery/" . $file_name);
                }

                move_uploaded_file($file_tmp, "resources/gallery/" . $file_name);
            }

            $_SESSION['success'] = "Files uploaded successfully.";
        }
    }

    header("Location: records.php");
    exit(); 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
