<?php 
session_start();
include "includes/dbconnect.php";

if (isset($_POST["register"])) {
    $user_name = $_POST['user_name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $code = $_POST['code'];
    $severity = $_POST['severity'];
    $currentDateTime = new DateTime();
    $currentDateTime = $currentDateTime->format('Y-m-d H:i:s');

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO patients (user_name, first_name, last_name, age, phone, code, severity, time_in_queue) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssis", $user_name, $first_name, $last_name, $age, $phone, $code, $severity, $currentDateTime);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success'] = "Patient registered successfully! your code is <strong>".$code."</strong>";
        header('location: login.php');
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

include "includes/header.php";
?>

        <div class="card">
            <div class="card-header">
                <h2>Patient Registration</h2>
            </div>
            <div class="card-body">
                <form id="registerform" method="post" action="register.php">
                    <div class="row mb-3">
                        <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="user_name" name="user_name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="code" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="code" name="code" required readonly>
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
                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="age" name="age" min="0" max="999" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" pattern="\d{10}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="severity" class="col-sm-2 col-form-label">Severity</label>
                        <div class="col-sm-6">
                            <select class="form-select" id="severity" name="severity" required>
                                <option value="">Select Severity</option>
                                <option value="1">Minor</option>
                                <option value="2">Moderate</option>
                                <option value="3">Severe</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" name="register" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php 
include "includes/footer.php";
?>

<script>
    function generateCode() {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        let code = '';
        for (let i = 0; i < 3; i++) {
            code += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        document.getElementById('code').value = code;
    }
    window.onload = generateCode;
</script>
