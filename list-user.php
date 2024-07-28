<?php 
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header('location: index.php');
}
include "includes/dbconnect.php";

$sql = "SELECT id, email, first_name, last_name, role, status FROM users WHERE role='0' ORDER BY first_name, last_name ASC";
$result = $conn->query($sql);

include "includes/header.php";
?>

        <div class="card">
            <div class="card-header">
                <h2>User List</h2>
                <a href="new-user.php" class="btn btn-sm btn-primary float-end">New User</a>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['status']==1) {
                                    $status = "Active";
                                } else {
                                    $status = "Inactive";
                                }
                                if ($row['role']==1) {
                                    $role = "Admin";
                                } else {
                                    $role = "Staff";
                                }
                                echo "<tr>
                                    <td>{$row['first_name']} {$row['last_name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$role}</td>
                                    <td>{$status}</td>
                                    <td>
                                        <a href='delete-user.php?userid={$row['id']}' class='btn btn-sm btn-danger delete-btn'>Delete</a>
                                    </td>
                                </tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php 
include "includes/footer.php";
?>