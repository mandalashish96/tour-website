<?php
require('com/essential.php');
require('com/db_conn.php');
adminLogin();

// Handle Insert, Update, Delete for Destinations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $upload_dir = 'uploads/';
        $image_name = basename($_FILES['image']['name']);
        $image_path = $upload_dir . $image_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
            $conn->query("INSERT INTO destinations (image_path, title) VALUES ('$image_path', '$title')");
        }
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];

        if ($_FILES['image']['name']) {
            $upload_dir = 'uploads/';
            $image_name = basename($_FILES['image']['name']);
            $image_path = $upload_dir . $image_name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                $conn->query("UPDATE destinations SET image_path='$image_path', title='$title' WHERE id=$id");
            }
        } else {
            $conn->query("UPDATE destinations SET title='$title' WHERE id=$id");
        }
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $conn->query("DELETE FROM destinations WHERE id=$id");
    }
}

// Fetch all destinations
$result = $conn->query("SELECT * FROM destinations");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Destinations</title>
    <?php require('com/header_link.php'); ?>
</head>

<body>

    <?php require('com/header.php'); ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Manage Destinations</h2>

        <!-- Add/Edit Form -->
        <form method="POST" enctype="multipart/form-data" class="mb-4">
            <input type="hidden" name="id" id="destination-id">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" name="add" id="add-btn" class="btn btn-success">Add</button>
            <button type="submit" name="update" id="update-btn" class="btn btn-primary d-none">Update</button>
        </form>

        <!-- Destinations Table -->
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><img src="<?= $row['image_path'] ?>" alt="Image" width="100"></td>
                        <td><?= $row['title'] ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="editDestination(<?= $row['id'] ?>, '<?= $row['title'] ?>', '<?= $row['image_path'] ?>')">Edit</button>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        function editDestination(id, title, imagePath) {
            document.getElementById('destination-id').value = id;
            document.getElementById('title').value = title;
            document.getElementById('add-btn').classList.add('d-none');
            document.getElementById('update-btn').classList.remove('d-none');
        }
    </script>

    <?php require('com/footer_link.php'); ?>
</body>

</html>
