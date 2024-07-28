<?php 
session_start();
if (!isset($_SESSION['patientlogin'])) {
    header('location: index.php');
}
include "includes/dbconnect.php";

if (isset($_POST["update"])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $severity = $_POST['severity'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE patients SET first_name=?, last_name=?, age=?, phone=?, severity=? WHERE id=?");
    $stmt->bind_param("ssisii", $first_name, $last_name, $age, $phone, $severity, $_SESSION['patientid']);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['success'] = "Patient updated successfully!";
        header('location: index.php');
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

$stmt = $conn->prepare("SELECT * FROM patients WHERE id = ?");
$stmt->bind_param("i", $_SESSION['patientid']);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['user_name'];
    $firstname = $row['first_name'];
    $lastname = $row['last_name'];
    $age = $row['age'];
    $code = $row['code'];
    $phone = $row['phone'];
    $severity = $row['severity'];
}

include "includes/header.php";
?>

        <div class="card">
            <div class="card-header">
                <h2>Patient Registration</h2>
            </div>
            <div class="card-body">
                <form id="registerform" method="post" action="">
                    <div class="row mb-3">
                        <label for="user_name" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?=$username?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="code" class="col-sm-2 col-form-label">Code</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="code" name="code" value="<?=$code?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$firstname?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="last_name" name="last_name" value="<?=$lastname?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="age" class="col-sm-2 col-form-label">Age</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="age" name="age" min="0" max="999" value="<?=$age?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" pattern="\d{10}" value="<?=$phone?>" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="severity" class="col-sm-2 col-form-label">Severity</label>
                        <div class="col-sm-6">
                            <select class="form-select" id="severity" name="severity" required>
                                <option value="">Select Severity</option>
                                <option value="1" <?=($severity==1?'selected':'')?>>Minor</option>
                                <option value="2" <?=($severity==2?'selected':'')?>>Moderate</option>
                                <option value="3" <?=($severity==3?'selected':'')?>>Severe</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
<?php 
include "includes/footer.php";
?>
