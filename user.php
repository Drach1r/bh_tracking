<?php
include 'includes/header.php';
include 'includes/navbar.php';


// Retrieve registered user data from the database
$stmt = $pdo->query('SELECT * FROM users');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container mt-5">
<div class="table-container">
    <table class="table table-borderd">
        <thead>
        <tr>
        <th class="text-center" style="color: black; background-color:#f0a190">First Name</th>
        <th class="text-center" style="color: black; background-color:#f0a190">Last Name</th>
        <th class="text-center" style="color: black; background-color:#f0a190">Email</th>
        <th class="text-center" style="color: black; background-color:#f0a190">Role</th>
        <th class="text-center" style="color: black; background-color:#f0a190">Action</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['first_name']; ?></td>
                <td><?php echo $user['last_name']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>

                <td>
    <?php if ($user['approved'] == 1): ?>
        <span class="badge bg-success">Approved</span>
        <form action="approve_user.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
            <button type="submit" class="btn btn-danger" name="unapprove">Unapprove</button>
            <button type="submit" class="btn btn-success d-none" name="approve">Approve</button>
        </form>
    <?php else: ?>
        <span class="badge bg-danger">Unapproved</span>
        <form action="approve_user.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
            <button type="submit" class="btn btn-danger d-none" name="unapprove">Unapprove</button>
            <button type="submit" class="btn btn-success" name="approve">Approve</button>
        </form>
    <?php endif; ?>
</td>


            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>



<?php
include 'includes/scripts.php';
include 'includes/footer.php';
?>