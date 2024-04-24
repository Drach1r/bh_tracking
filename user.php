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
                        <th class="text-center" style="color: black; background-color:#f0a190">Status</th>
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

                        $sql = "SELECT id, first_name, last_name, email, role, approved FROM users WHERE role != 'super_admin'";
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
                                    echo "<button type='submit' class='btn btn-warning d-none' name='unapprove'>Unapprove</button>";
                                    echo "<button type='submit' class='btn btn-success' name='approve'>Approve</button>";
                                    echo "</form>";
                                }
                                echo "</td>";

                                echo "<td class='text-center'>";
                                echo "<button type='button' class='btn btn-success edit-btn' data-bs-toggle='modal' data-bs-target='#editModal'  data-id='" . $row['id'] . "'>
                                Edit
                              </button>";


                                echo "<form action='delete_user.php' method='post' style='display: inline; margin-left: 5px;'>";
                                echo "<input type='hidden' name='user_id' value='" . $row['id'] . "'>";
                                echo "<button type='submit' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</button>";
                                echo "</form>";
                                echo "</td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    ?>
                </tbody>

            </table>
        </div>
    </section>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Edit User Role</h5>

            </div>
            <form id="editForm" action="resources/dr/edit_user.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editUserId">
                    <div class="form-group">
                        <label for="editFirstName">First Name:</label>
                        <input type="text" class="form-control" id="editFirstName" name="first_name" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="editLastName">Last Name:</label>
                        <input type="text" class="form-control" id="editLastName" name="last_name" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input type="email" class="form-control" id="editEmail" name="email" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="editRole">Role:</label>
                        <select class="form-control" id="editRole" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">


                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

        </div>

    </div>
</div>

<script>
    $(document).ready(function() {

        $('.edit-btn').click(function() {
            var userId = $(this).data('id');
            $.ajax({
                url: 'resources/dr/get_user.php',
                type: 'GET',
                data: {
                    id: userId
                },
                success: function(response) {
                    var user = JSON.parse(response);
                    $('#editUserId').val(user.id);
                    $('#editFirstName').val(user.first_name);
                    $('#editLastName').val(user.last_name);
                    $('#editEmail').val(user.email);
                    $('#editRole').val(user.role);
                    $('#editModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<style>
    #recordstable_wrapper {
        width: 100%;
    }
</style>

<script>
    $(document).ready(function() {
        $('#recordstable').DataTable({
            "scrollY": "45vh"
        });
    });
</script>

<?php
include 'includes/footer.php';
?>