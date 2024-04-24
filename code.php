<?php
include 'includes/boot.php';

if (isset($_POST['register'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password != $confirm) {
        $_SESSION['error'] = 'Passwords did not match';
        header("Location: index.php");
        exit();
    }


    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $stmt->execute(['email' => $email]);
    if ($stmt->rowCount() > 0) {
        $_SESSION['error'] = 'Email already taken';
        header("Location: index.php");
        exit();
    }


    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $stmt = $pdo->prepare('INSERT INTO users (first_name, last_name, email, password, approved, role) VALUES (:first_name, :last_name, :email, :password, :approved, :role)');
    try {
        $stmt->execute([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $hashed_password,
            'approved' => false,
            'role' => 'user'
        ]);

        $_SESSION['success'] = 'Registration successful. Waiting for approval.';
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header("Location: index.php");
        exit();
    }
}
