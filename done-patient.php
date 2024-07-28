<?php 
session_start();
if (!isset($_SESSION['userlogin']) && !isset($_SESSION['adminlogin'])) {
    header('location: login.php');
} 
include "includes/dbconnect.php";

if (isset($_GET['patientid'])) {
    $id = $_GET['patientid'];

    $stmt = $conn->prepare("Delete FROM patients WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Patient's treatment is completed successfully.";
        header('location: index.php');
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>