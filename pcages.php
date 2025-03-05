<?php
include 'db_conn.php';
 // Start session to check login status

// Fetch packages
$packages = $conn->query("SELECT * FROM packages");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>

    <?php
    include('com/navbar.php');
    include('com/header_link.php');
    ?>
</head>

<style>
    /*** Facts ***/
    .fact {
        background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url(assets/img/indbg.webp) center center no-repeat;
        background-size: cover;
    }
</style>

<body>
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb-2">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Packages</h3>
        </div>
    </div>
    <!-- Header End -->

    <!-- Packages start -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">HOLIDAY DESTINATIONS</h2>
            <div class="row gy-4" id="card-container">
                <?php while ($row = $packages->fetch_assoc()): ?>
                    <div class="col-md-4">
                        <div class="card custom-card shadow-sm border-0">
                            <img src="assets/img/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['title']); ?>">
                            <div class="card-body">
                                <span class="badge bg-danger mb-2">Holiday Destinations</span>
                                <h5 class="card-title fw-bold"><?php echo htmlspecialchars($row['title']); ?></h5>
                                <p class="text-muted mb-2">Starting from ₹ <?php echo htmlspecialchars($row['price']); ?></p>
                                <a href="#" 
                                   class="btn btn-primary w-100 book-now-btn" 
                                   data-id="<?php echo htmlspecialchars($row['id']); ?>" 
                                   data-logged-in="<?php echo isset($_SESSION['logged_in']) && $_SESSION['logged_in'] ? 'true' : 'false'; ?>">
                                   Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="text-center mt-4">
                
            </div>
        </div>
    </section>

    <script>
        // Handle Book Now button click
        document.querySelectorAll('.book-now-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const isLoggedIn = this.getAttribute('data-logged-in') === 'true';
                const packageId = this.getAttribute('data-id');

                if (isLoggedIn) {
                    // If user is logged in, redirect to the booking page
                    window.location.href = `pack_deti.php?id=${packageId}`;
                } else {
                    // If user is not logged in, show a popup message
                    alert("Please login first!");
                    window.location.href = 'siginup.php'; // Redirect after showing the alert
                }
            });
        });

        // Handle Load More button
        document.getElementById('load-more-btn').addEventListener('click', function () {
            fetch('load_more.php') // Fetch only the 4th package
                .then(response => response.text())
                .then(data => {
                    if (data.trim()) {
                        document.getElementById('card-container').insertAdjacentHTML('beforeend', data);
                        // Hide the button after loading the 4th package
                        document.getElementById('load-more-btn').style.display = 'none';
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
    <!-- Packages end -->

    <?php
    include('com/footer.php');
    include('com/footer_link.php');
    ?>

    <script>
        $(document).ready(function() {
            $('.counter').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });
    </script>
</body>

</html>
