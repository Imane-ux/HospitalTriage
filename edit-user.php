<?php 
include "includes/dbconnect.php";

if (isset($_POST["save"])) {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (email, first_name, last_name, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $first_name, $last_name, $password);

    if ($stmt->execute()) {
        echo "User created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

include "includes/header.php";
?>

        <div class="card">
            <div class="card-header">
                <h2>Edit User</h2>
            </div>
            <div class="card-body">
                <form id="edituserform" action="edit-user.php" method="post">
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php 
include "includes/footer.php";
?>