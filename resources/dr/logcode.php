<?php
include '../../includes/boot.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email');

    try {
        $stmt->execute(['email' => $email]);

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();

            if (password_verify($password, $user['password'])) {
                if ($user['approved'] == 1) { // Check if the user is approved
                    if ($user['role'] == 'admin') {
                        $_SESSION['user_id'] = $user['id'];
                        header("Location:../../records.php");
                        exit();
                    } elseif ($user['role'] == 'super_admin') {
                        $_SESSION['user_id'] = $user['id'];
                        header("Location:../../records.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = 'Your account has not been approved yet.';
                    header('location: ../../index.php');
                    exit();
                }
            } else {
                $_SESSION['error'] = 'Incorrect password';
                header('location: ../../index.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 'No account associated with the email';
            header('location: ../../index.php');
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = $e->getMessage();
        header('location: ../../index.php');
        exit();
    }
}

$key = $_POST['CSRFkey'];
$token = hash_hmac('sha256', 'This is for index page', $key);
if (hash_equals($token, $_POST['CSRFtoken'])) {
} else {
}
