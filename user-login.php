<?php 
session_start();
include "includes/dbconnect.php";

if (isset($_POST["login"])) {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, role, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($userId, $role, $hashedPassword);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashedPassword)) {
        if ($role == 1) {
            $_SESSION['adminlogin'] = true;
            $_SESSION['user_id'] = $userId;
            header("Location: index.php");
        } else {
            $_SESSION['userlogin'] = true;
            $_SESSION['user_id'] = $userId;
            header("Location: index.php");
        }
    } else {
        $_SESSION['error'] = "Login failed. Invalid user name or password.";
    }

    $stmt->close();
    $conn->close();
}

include "includes/header.php";
?>

        <div class="card">
            <div class="card-header">
                <h2>User/Admin Login</h2>
            </div>
            <div class="card-body">
                <form action="" method="post" id="userloginform">
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" name="login" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php 
include "includes/footer.php";
?>