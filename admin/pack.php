<?php
require('com/essential.php');
require('com/db_conn.php');
adminLogin();
?>

<?php


// Handle form submissions for CRUD
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        // Handle image upload
        $target_dir = "../assets/img/";
        $image_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $image_file);

        // Add new package
        $title = $_POST['title'];
        $price = $_POST['price'];
        $conn->query("INSERT INTO package (title, price, image_path) VALUES ('$title', '$price', '" . htmlspecialchars(basename($_FILES["image"]["name"])) . "')");
    } elseif (isset($_POST['edit'])) {
        // Handle image upload (optional update)
        $id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];

        if ($_FILES["image"]["name"]) {
            $target_dir = "../assets/img/";
            $image_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $image_file);
            $conn->query("UPDATE package SET title='$title', price='$price', image_path='" . htmlspecialchars(basename($_FILES["image"]["name"])) . "' WHERE id=$id");
        } else {
            $conn->query("UPDATE package SET title='$title', price='$price' WHERE id=$id");
        }
    } elseif (isset($_POST['delete'])) {
        // Delete package
        $id = $_POST['id'];
        $conn->query("DELETE FROM package WHERE id=$id");
    }
}

// Fetch packages for display
$packages = $conn->query("SELECT * FROM package");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <?php
    require('com/header_link.php');
    ?>
</head>

<body>

    <?php
    require('com/header.php');
    ?>

<div class="container mt-5">
        <h2>Manage Packages</h2>
        <!-- Add/Edit Package Form -->
        <form method="POST" class="mb-4" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <button type="submit" name="add" class="btn btn-primary">Add Package</button>
            <button type="submit" name="edit" class="btn btn-success">Edit Package</button>
        </form>

        <!-- Package List -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $packages->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= htmlspecialchars($row['title']) ?></td>
                        <td>₹<?= htmlspecialchars($row['price']) ?></td>
                        <td>
                            <?php
                            $imagePath = "../assets/img/" . htmlspecialchars($row['image_path']);
                            if (file_exists($imagePath)) {
                                echo '<img src="' . $imagePath . '" alt="Package Image" style="max-width: 100px; max-height: 50px;">';
                            } else {
                                echo '<p class="text-danger">Image not found.</p>';
                            }
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editPackage(<?= htmlspecialchars(json_encode($row)) ?>)">Edit</button>
                            <form method="POST" style="display:inline;">
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
        // Fill form with selected package data for editing
        function editPackage(package) {
            document.getElementById('id').value = package.id;
            document.getElementById('title').value = package.title;
            document.getElementById('price').value = package.price;
        }
    </script>

    <?php
    require('com/footer_link.php');
    ?>
</body>

</html>