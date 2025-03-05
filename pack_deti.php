<?php
// Include database connection
include 'db_conn.php';

// Check if the package ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch package details
    $result = $conn->query("SELECT * FROM packages WHERE id = '$id'");
    $package = $result->fetch_assoc();

    if (!$package) {
        echo "Package not found.";
        exit;
    }
} else {
    echo "No package ID provided.";
    exit;
}

// Include reusable components
include('com/navbar.php');
include('com/header_link.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Details</title>
    <!-- Optional Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-card {
      background: linear-gradient(to right, #e3f2fd, #ffffff);
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      padding: 20px;
      text-align: center;
      max-width: 350px;
      margin: auto;
    }
    .custom-card .price-old {
      text-decoration: line-through;
      color: #757575;
    }
    .custom-card .price-new {
      font-size: 24px;
      font-weight: bold;
      color: #1e88e5;
    }
    .custom-card .emi-info {
      font-size: 14px;
      color: #757575;
    }
    .custom-card .btn-custom {
      margin-top: 15px;
      background-color: #1e88e5;
      color: white;
      border-radius: 25px;
    }
    .custom-card .btn-custom:hover {
      background-color: #1565c0;
    }

    
    </style>
</head>

<body>

    <!-- Breadcrumb Section -->
    <div class="container-fluid bg-breadcrumb-2">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Package Details</h3>
        </div>
    </div>

   <!-- Package Details Section -->
<div class="container my-5">
    <div class="card border-0 shadow-lg" style="background: linear-gradient(to bottom right, #007BFF, #00C6FF); color: white;">
        <div class="row g-0">
            <!-- Package Image -->
            <div class="col-md-6">
                <?php
                $imagePath = "assets/img/" . htmlspecialchars($package['image']);
                if (file_exists($imagePath)) {
                    echo '<img src="' . $imagePath . '" alt="Package Image" class="img-fluid rounded-start">';
                } else {
                    echo '<p class="text-center py-5">Image not found.</p>';
                }
                ?>
            </div>

            <!-- Package Information -->
            <div class="col-md-6">
                <div class="card-body">
                    <h2 class="card-title fw-bold"><?= htmlspecialchars($package['title']) ?></h2>
                    <p><strong>Duration:</strong> <?= htmlspecialchars($package['duration']) ?></p>
                    <p><strong>Origin:</strong> <?= htmlspecialchars($package['origin']) ?></p>
                    <p><strong>Destination:</strong> <?= htmlspecialchars($package['destination']) ?></p>
                    <p><strong>Departure:</strong> <?= htmlspecialchars($package['departure']) ?></p>
                    <p><strong>Upcoming Date of Journey:</strong> <?= htmlspecialchars($package['upcoming_date']) ?></p>
                    <p><strong>Inclusions:</strong> <?= nl2br(htmlspecialchars($package['inclusions'])) ?></p>
                    <h4 class="fw-bold">Price: ₹ <?= number_format(htmlspecialchars($package['price']), 2) ?></h4>
                    <a href="booking.php?id=<?= htmlspecialchars($package['id']) ?>" class="btn btn-light text-primary fw-bold mt-3">Proceed to Booking</a>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <?php
                            $imagePath = "assets/img/" . htmlspecialchars($package['hotel_image']);
                            if (file_exists($imagePath)) {
                                echo '<img src="' . $imagePath . '" alt="Package Image" class="img-fluid">';
                            } else {
                                echo '<p>Image not found.</p>';
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($package['hotel_title']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($package['hotel_description']) ?></< /p>
                                <p class="card-text">A reflection of everything Goan, The Zuri White Sands, Goa Resort & Casino is one of the 'Best Beach Resorts in Goa', a fact evident by the awards it has won, on account of being a much sought-after luxury beach resort. Varca, the picturesque beach on which the resort is located, is a place that offers privacy and solitude and an authentic Goan experience.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php
    include('com/footer.php');
    include('com/footer_link.php');
    ?>
</body>

</html>