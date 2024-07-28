<?php 
session_start();
include "includes/dbconnect.php";

if (isset($_POST["login"])) {
    // Get form data
    $user_name = $_POST['user_name'];
    $code = $_POST['user_code'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM patients WHERE user_name = ? AND code = ?");
    $stmt->bind_param("ss", $user_name, $code);

    // Execute the statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Login successful
        $_SESSION['patientlogin'] = true;
        $_SESSION['patientid'] = $row['id'];
        $_SESSION['patientname'] = $row['first_name']." ".$row['last_name'];
        $_SESSION['success'] = "Login successful. Welcome, " . htmlspecialchars($row['user_name']) . "!";

        header('location: index.php');
    } else {
        // Login failed
        $_SESSION['error'] = "Login failed. Invalid user name or code.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

include "includes/header.php";
?>

        <div class="card">
            <div class="card-header">
                <h2>Patient Login</h2>
            </div>
            <div class="card-body">
            <form id="loginform" action="login.php" method="post">
                <div class="row mb-3">
                    <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="user_name" name="user_name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="user_code" class="col-sm-2 col-form-label">Code</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="user_code" name="user_code" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6 offset-sm-2">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
<?php 
include "includes/footer.php";
?>