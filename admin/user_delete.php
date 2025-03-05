<?php
require('com/essential.php');
require('com/db_conn.php');
adminLogin();

// Validate if `id` is provided and delete user
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Query to delete user data
    $delete_query = "DELETE FROM `signup` WHERE `id` = '$id'";
    if (mysqli_query($conn, $delete_query)) {
        echo "<script>alert('User deleted successfully!');</script>";
        echo "<script>window.location.href = 'user.php';</script>"; // Redirect to user list or another page
    } else {
        die("Delete Failed: " . mysqli_error($conn));
    }
} else {
    die("Invalid ID or ID not provided in URL.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <?php require('com/header_link.php'); ?>
</head>

<body>
    <?php require('com/header.php'); ?>

    

    <?php require('com/footer_link.php'); ?>
</body>

</html>
