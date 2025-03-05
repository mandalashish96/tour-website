<?php
require('com/essential.php');
require('com/db_conn.php');
adminLogin();





// Handle Delete Operation
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM bookings WHERE id = $id";
    if ($conn->query($sql)) {
        $message = "Booking deleted successfully!";
    } else {
        $error = "Failed to delete booking: " . $conn->error;
    }
}

// Handle Edit Form Submission
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $booking_date = $_POST['datetime'];
    $destination = $_POST['destination'];
    $persons = $_POST['persons'];
    $category = $_POST['category'];
    $special_request = $_POST['special_request'];

    $sql = "UPDATE bookings SET 
            name='$name', 
            email='$email', 
            booking_date='$booking_date', 
            destination='$destination', 
            persons='$persons', 
            category='$category', 
            special_request='$special_request'
            WHERE id=$id";

    if ($conn->query($sql)) {
        $message = "Booking updated successfully!";
    } else {
        $error = "Failed to update booking: " . $conn->error;
    }
}

// Fetch All Records
$bookings = $conn->query("SELECT * FROM bookings");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>booking</title>
    <?php
    require('com/header_link.php');
    ?>
</head>

<body>

    <?php
    require('com/header.php');
    ?>

    <div class="container mt-5">
        <h1 class="mb-4">Admin - Booking Management</h1>

        <!-- Display Success or Error Messages -->
        <?php if (isset($message)) { ?>
            <div class="alert alert-success"><?= $message; ?></div>
        <?php } ?>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php } ?>

        <!-- Booking Records Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Destination</th>
                    <th>Persons</th>
                    <th>Category</th>
                    <th>Special Request</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $bookings->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['booking_date'] ?></td>
                        <td><?= $row['destination'] ?></td>
                        <td><?= $row['persons'] ?></td>
                        <td><?= $row['category'] ?></td>
                        <td><?= $row['special_request'] ?></td>
                        <td>
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>">Edit</button>

                            <!-- Delete Button -->
                            <a href="booking.php?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="admin_page.php">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Booking</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" value="<?= $row['name'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="datetime" class="form-label">Date & Time</label>
                                            <input type="datetime-local" class="form-control" name="datetime" value="<?= date('Y-m-d\TH:i', strtotime($row['booking_date'])) ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="destination" class="form-label">Destination</label>
                                            <input type="text" class="form-control" name="destination" value="<?= $row['destination'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="persons" class="form-label">Persons</label>
                                            <input type="number" class="form-control" name="persons" value="<?= $row['persons'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <input type="text" class="form-control" name="category" value="<?= $row['category'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="special_request" class="form-label">Special Request</label>
                                            <textarea class="form-control" name="special_request" rows="3"><?= $row['special_request'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End of Edit Modal -->
                <?php } ?>
            </tbody>
        </table>
    </div>





    <?php
    require('com/footer_link.php');
    ?>
</body>

</html>