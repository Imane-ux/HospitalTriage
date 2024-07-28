<?php 
session_start();

include "includes/dbconnect.php";

include "includes/header.php";
?>
        
<?php 
if (isset($_SESSION['patientlogin'])) {
    $stmt = $conn->prepare("SELECT * FROM patients WHERE id = ?");
    $stmt->bind_param("i", $_SESSION['patientid']);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['severity'] == 1) {
            $severity = "Minor";
        } elseif ($row['severity'] == 2) {
            $severity = "Moderate";
        } else {
            $severity = "Severe";
        }
        $timestamp = $row['time_in_queue'];
        $timestampDateTime = new DateTime($timestamp);
        $currentDateTime = new DateTime();
        $interval = $currentDateTime->diff($timestampDateTime);
        $formattedInterval = $interval->format('%H:%I:%S');
?>
        <div class="card">
            <div class="card-header">
                <h2>Your Appointment Details</h2>
                <a href="edit-patient.php" class="btn btn-sm btn-primary float-end">Edit</a>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-2">Name</div>
                    <div class="col-sm-6"><?=$row['first_name']." ".$row['last_name']?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">Age</div>
                    <div class="col-sm-6"><?=$row['age']?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">Phone</div>
                    <div class="col-sm-6"><?=$row['phone']?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">Severity</div>
                    <div class="col-sm-6"><?=$severity?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-2">Waiting Time</div>
                    <div class="col-sm-6"><?=$formattedInterval?></div>
                </div>
            </div>
        </div>
<?php
    }
} elseif (isset($_SESSION['userlogin']) || isset($_SESSION['adminlogin'])) { 
?>
        <div class="card">
            <div class="card-header">
                <h2>Patient Priority List</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Priority</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Age</th>
                            <th>Severity</th>
                            <th>Waiting</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM patients WHERE status = 'waiting' ORDER BY severity DESC, time_in_queue ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $priority = 1;
                            while ($row = $result->fetch_assoc()) {
                                if ($row['severity'] == 1) {
                                    $severity = "Minor";
                                } elseif ($row['severity'] == 2) {
                                    $severity = "Moderate";
                                } else {
                                    $severity = "Severe";
                                }

                                $timestamp = $row['time_in_queue'];
                                $timestampDateTime = new DateTime($timestamp);
                                $currentDateTime = new DateTime();
                                $interval = $currentDateTime->diff($timestampDateTime);
                                $formattedInterval = $interval->format('%H:%I:%S');
                                echo "<tr>
                                    <td>{$priority}</td>
                                    <td>{$row['first_name']} {$row['last_name']}</td>
                                    <td>{$row['phone']}</td>
                                    <td>{$row['age']}</td>
                                    <td>{$severity}</td>
                                    <td>{$formattedInterval}</td>
                                    <td>
                                        <a href='done-patient.php?patientid={$row['id']}' class='btn btn-sm btn-success'>Done</a>
                                    </td>
                                </tr>";
                                $priority++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
<?php 
}

include "includes/footer.php";
?>