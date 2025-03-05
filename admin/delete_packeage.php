<?php
require('com/db_conn.php');
// require('com/function.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM packages WHERE id=$id");
    header("Location: view_packages.php");
}
?>
