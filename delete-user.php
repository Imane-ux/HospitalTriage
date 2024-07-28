<?php 
session_start();
if (!isset($_SESSION['adminlogin'])) {
    header('location: index.php');
} 
include "includes/dbconnect.php";

if (isset($_GET['userid'])) {
    $id = $_GET['userid'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "User deleted successfully.";
        header('location: list-user.php');
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>