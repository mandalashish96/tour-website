<?php
// Include required files and check for admin login
require('com/essential.php');
require('com/db_conn.php');
adminLogin();

// Set pagination variables
$limit = 5; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        // Add Package
        $title = $_POST['title'];
        $duration = $_POST['duration'];
        $origin = $_POST['origin'];
        $destination = $_POST['destination'];
        $departure = $_POST['departure'];
        $upcoming_date = $_POST['upcoming_date'];
        $inclusions = $_POST['inclusions'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $hotel_image = $_FILES['hotel_image']['name'];
        $hotel_description = $_POST['hotel_description'];
        $hotel_title = $_POST['hotel_title'];

        $targetImage = "uploads/" . basename($image);
        $targetHotelImage = "uploads/" . basename($hotel_image);

        // Create uploads directory if it doesn't exist
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        // Move uploaded files to the target directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetImage) &&
            move_uploaded_file($_FILES['hotel_image']['tmp_name'], $targetHotelImage)) {
            $sql = "INSERT INTO packages (title, duration, origin, destination, departure, upcoming_date, inclusions, price, image, hotel_image, hotel_description, hotel_title) 
                    VALUES ('$title', '$duration', '$origin', '$destination', '$departure', '$upcoming_date', '$inclusions', '$price', '$image', '$hotel_image', '$hotel_description', '$hotel_title')";
            if ($conn->query($sql)) {
                echo "Package added successfully.";
            } else {
                echo "Error adding package: " . $conn->error;
            }
        } else {
            echo "Failed to upload the images.";
        }
    } elseif (isset($_POST['update'])) {
        // Update Package
        $id = $_POST['id'];
        $title = $_POST['title'];
        $duration = $_POST['duration'];
        $origin = $_POST['origin'];
        $destination = $_POST['destination'];
        $departure = $_POST['departure'];
        $upcoming_date = $_POST['upcoming_date'];
        $inclusions = $_POST['inclusions'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $hotel_image = $_FILES['hotel_image']['name'];
        $hotel_description = $_POST['hotel_description'];
        $hotel_title = $_POST['hotel_title'];

        $imageUpdate = '';
        $hotelImageUpdate = '';
        if ($image) {
            $targetImage = "uploads/" . basename($image);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetImage)) {
                $imageUpdate = ", image='$image'";
            } else {
                echo "Failed to upload the package image.";
            }
        }
        if ($hotel_image) {
            $targetHotelImage = "uploads/" . basename($hotel_image);
            if (move_uploaded_file($_FILES['hotel_image']['tmp_name'], $targetHotelImage)) {
                $hotelImageUpdate = ", hotel_image='$hotel_image'";
            } else {
                echo "Failed to upload the hotel image.";
            }
        }

        $sql = "UPDATE packages SET title='$title', duration='$duration', origin='$origin', destination='$destination', 
                departure='$departure', upcoming_date='$upcoming_date', inclusions='$inclusions', price='$price', 
                hotel_description='$hotel_description', hotel_title='$hotel_title' $imageUpdate $hotelImageUpdate 
                WHERE id='$id'";
        if ($conn->query($sql)) {
            echo "Package updated successfully.";
        } else {
            echo "Error updating package: " . $conn->error;
        }
    } elseif (isset($_POST['delete'])) {
        // Delete Package
        $id = $_POST['id'];
        $sql = "DELETE FROM packages WHERE id='$id'";
        if ($conn->query($sql)) {
            echo "Package deleted successfully.";
        } else {
            echo "Error deleting package: " . $conn->error;
        }
    }
}

// Fetch all packages with pagination
$sql = "SELECT * FROM packages LIMIT $start, $limit";
$packages = $conn->query($sql);

// Get total number of packages for pagination
$totalResult = $conn->query("SELECT COUNT(*) as count FROM packages");
$totalRow = $totalResult->fetch_assoc();
$totalPackages = $totalRow['count'];
$totalPages = ceil($totalPackages / $limit);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Packages</title>
    <?php require('com/header_link.php'); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php require('com/header.php'); ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Manage Packages</h1>

        <!-- Add/Update Form -->
        <form method="POST" enctype="multipart/form-data" class="mb-4">
            <div class="row">
                <input type="hidden" name="id" id="id">
                <div class="col-md-6 mb-3">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="duration" id="duration" class="form-control" placeholder="Duration" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="origin" id="origin" class="form-control" placeholder="Origin" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="destination" id="destination" class="form-control" placeholder="Destination" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="departure" id="departure" class="form-control" placeholder="Departure" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="date" name="upcoming_date" id="upcoming_date" class="form-control" required>
                </div>
                <div class="col-md-12 mb-3">
                    <textarea name="inclusions" id="inclusions" class="form-control" placeholder="Inclusions" rows="3" required></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="number" name="price" id="price" class="form-control" placeholder="Price" step="0.01" required>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="file" name="hotel_image" id="hotel_image" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" name="hotel_title" id="hotel_title" class="form-control" placeholder="Hotel Title" required>
                </div>
                <div class="col-md-12 mb-3">
                    <textarea name="hotel_description" id="hotel_description" class="form-control" placeholder="Hotel Description" rows="3" required></textarea>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" name="add" class="btn btn-primary">Add Package</button>
                    <button type="submit" name="update" class="btn btn-warning">Update Package</button>
                </div>
            </div>
        </form>

        <!-- Display Packages -->
        <table class="table table-bordered table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Departure</th>
                    <th>Date</th>
                    <th>Inclusions</th>
                    <th>Price</th>
                    <th>Package Image</th>
                    <th>Hotel Title</th>
                    <th>Hotel Image</th>
                    <th>Hotel Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $packages->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['duration'] ?></td>
                        <td><?= $row['origin'] ?></td>
                        <td><?= $row['destination'] ?></td>
                        <td><?= $row['departure'] ?></td>
                        <td><?= $row['upcoming_date'] ?></td>
                        <td><?= $row['inclusions'] ?></td>
                        <td>₹<?= number_format($row['price'], 2) ?></td>
                        <td>
                            <?php
                            $imagePath = "uploads/" . $row['image'];
                            if (file_exists($imagePath) && $row['image']) {
                                echo '<img src="' . $imagePath . '" alt="Package Image" class="img-thumbnail" width="100">';
                            } else {
                                echo '<p>No Image</p>';
                            }
                            ?>
                        </td>
                        <td><?= $row['hotel_title'] ?></td>
                        <td>
                            <?php
                            $hotelImagePath = "uploads/" . $row['hotel_image'];
                            if (file_exists($hotelImagePath) && $row['hotel_image']) {
                                echo '<img src="' . $hotelImagePath . '" alt="Hotel Image" class="img-thumbnail" width="100">';
                            } else {
                                echo '<p>No Image</p>';
                            }
                            ?>
                        </td>
                        <td><?= $row['hotel_description'] ?></td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" 
                                    onclick="editPackage(<?= htmlspecialchars(json_encode($row)) ?>)">
                                Edit
                            </button>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="btn btn-link <?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    </div>

    <?php require('com/footer_link.php'); ?>

    <script>
        function editPackage(package) {
            document.getElementById('id').value = package.id;
            document.getElementById('title').value = package.title;
            document.getElementById('duration').value = package.duration;
            document.getElementById('origin').value = package.origin;
            document.getElementById('destination').value = package.destination;
            document.getElementById('departure').value = package.departure;
            document.getElementById('upcoming_date').value = package.upcoming_date;
            document.getElementById('inclusions').value = package.inclusions;
            document.getElementById('price').value = package.price;
            document.getElementById('hotel_description').value = package.hotel_description;
            document.getElementById('hotel_title').value = package.hotel_title;
        }
    </script>
</body>

</html>
