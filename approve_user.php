<?php
include 'includes/boot.php';

if (isset($_POST['approve']) || isset($_POST['unapprove'])) {
    $user_id = $_POST['user_id'];
    $action = isset($_POST['approve']) ? 'approve' : 'unapprove';
    $approval_status = $action == 'approve' ? 1 : 0;

    // Update the user's approval status in the database
    $stmt = $pdo->prepare('UPDATE users SET approved = :approval_status WHERE id = :user_id');
    $stmt->execute(['user_id' => $user_id, 'approval_status' => $approval_status]);

    // Set session message
    $_SESSION['success'] = $action == 'approve' ? 'User approved successfully.' : 'User unapproved successfully.';
}

// Redirect back to the admin panel
header("Location: user.php");
exit();
?>
