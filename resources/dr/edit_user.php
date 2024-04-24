<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bh_tracking";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $role = $_POST['role'];


        $sql = "UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email, role = :role WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id', $id);


        $stmt->execute();




        $_SESSION['message'] = "User data updated successfully.";

        header("Location: ../../user.php");
        exit();
    } else {
        echo "Form data not submitted.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
