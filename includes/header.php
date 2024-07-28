<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houspital Triage</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
<?php 
include "includes/navbar.php";
?>
    <div class="container mt-5">
<?php
  if(isset($_SESSION['error'])){
?>
    <div class="alert alert-danger" role="alert">
        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php
  }

  if(isset($_SESSION['success'])){
?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
<?php
  }
?>