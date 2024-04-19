<?php
include 'includes/header.php';
include 'includes/navbar.php';
?>

<br>
<div class="container">
    <section class="example">
        <div class="d-flex justify-content-center">
            <table class="table table-bordered" id="recordstable">
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
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "bh_tracking";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $sql = "SELECT id, first_name, last_name, email, role, approved FROM users";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();

                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td class='text-center'>" . $row['first_name'] . "</td>";
                                echo "<td class='text-center'>" . $row['last_name'] . "</td>";
                                echo "<td class='text-center'>" . $row['email'] . "</td>";
                                echo "<td class='text-center'>" . $row['role'] . "</td>";
                                echo "<td class='text-center'>";
                                if ($row['approved'] == 1) {
                                    echo "<span class='badge bg-success'>Approved</span>";
                                    echo "<form action='approve_user.php' method='post'>";
                                    echo "<input type='hidden' name='user_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' class='btn btn-danger' name='unapprove'>Unapprove</button>";
                                    echo "<button type='submit' class='btn btn-success d-none' name='approve'>Approve</button>";
                                    echo "</form>";
                                } else {
                                    echo "<span class='badge bg-danger'>Unapproved</span>";
                                    echo "<form action='approve_user.php' method='post'>";
                                    echo "<input type='hidden' name='user_id' value='" . $row['id'] . "'>";
                                    echo "<button type='submit' class='btn btn-danger d-none' name='unapprove'>Unapprove</button>";
                                    echo "<button type='submit' class='btn btn-success' name='approve'>Approve</button>";
                                    echo "</form>";
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    
                    $conn = null;
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    #recordstable_wrapper {
        width: 100%;
    }
</style>

<script>
    $(document).ready(function () {
        $('#recordstable').DataTable({
            "scrollY": "300px"
        });
    });
</script>

<?php
include 'includes/footer.php';
?>
