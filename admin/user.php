<?php
// Include database connection and session management
require('com/db_conn.php');

// Function to check if admin is logged in
function adminLogin()
{
    // Implement your admin login validation logic
    // For now, we'll assume the admin is logged in
}

// Check admin login
adminLogin();

// Handle status update
if (isset($_GET['action']) && $_GET['action'] == 'toggle_status' && isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = intval($_GET['status']);
    $query = "UPDATE signup SET status = $status WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error updating user status: " . mysqli_error($conn));
    }
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <?php require('com/header_link.php'); ?>
</head>

<body>
    <?php require('com/header.php'); ?>

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">User Table</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <!-- <th scope="col">Password</th> -->
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Fetch user data
                                $query = "SELECT * FROM `signup`";
                                $result = mysqli_query($conn, $query);

                                if (!$result) {
                                    die("Query Failed: " . mysqli_error($conn));
                                }

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <!-- <td><?php echo $row['password']; ?></td> -->
                                        <td><?php echo ($row['status'] == 1) ? 'Active' : 'Inactive'; ?></td>
                                        <td>
                                            <a href="?action=toggle_status&id=<?php echo $row['id']; ?>&status=<?php echo ($row['status'] == 1) ? 0 : 1; ?>" 
                                               class="btn btn-<?php echo ($row['status'] == 1) ? 'warning' : 'success'; ?>">
                                                <?php echo ($row['status'] == 1) ? 'Deactivate' : 'Activate'; ?>
                                            </a>
                                            <a href="user_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('com/footer_link.php'); ?>
</body>

</html>
