<?php
require('com/essential.php');
require('com/db_conn.php');
adminLogin();

// Validate if `id` is provided and fetch user details
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Query to fetch user data
    $query = "SELECT * FROM `signup` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);

    if (!$result || mysqli_num_rows($result) === 0) {
        die("User not found or Query Failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
} else {
    die("Invalid ID or ID not provided in URL.");
}

// Handle form submission to update user details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = mysqli_real_escape_string($conn, $_POST['f_name']);
    $username = mysqli_real_escape_string($conn, $_POST['user']);

    // Update query
    $update_query = "UPDATE `signup` SET `fullname` = '$fullname', `username` = '$username' WHERE `id` = '$id'";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('User updated successfully!');</script>";
        echo "<script>window.location.href = 'user.php';</script>"; // Redirect to user list or another page
    } else {
        echo "<script>alert('Update Failed: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <?php require('com/header_link.php'); ?>
</head>

<body>
    <?php require('com/header.php'); ?>

    <div class="col-sm-12 col-xl-6">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Update Form</h6>
            <form method="POST">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Name</label>
                    <input type="text" name="f_name" class="form-control" id="fullname"
                        value="<?php echo htmlspecialchars($row['fullname']); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="user" class="form-control" id="username"
                        value="<?php echo htmlspecialchars($row['username']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>

    <?php require('com/footer_link.php'); ?>
</body>

</html>
