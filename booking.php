<?php
include('db_conn.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle Booking Form Submission
    $name = $_POST['name'];
    $email = $_POST['email'];
    $booking_date = $_POST['datetime'];
    $destination = $_POST['destination'];
    $persons = $_POST['persons'];
    $category = $_POST['category'];
    $special_request = $_POST['special_request'];

    $sql = "INSERT INTO bookings (name, email, booking_date, destination, persons, category, special_request) 
            VALUES ('$name', '$email', '$booking_date', '$destination', '$persons', '$category', '$special_request')";

    if ($conn->query($sql)) {
        $message = "Booking successful!";
    } else {
        $error = "Failed to book: " . $conn->error;
    }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

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
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Booking</h1>
                
        </div>
    </div>
    <!-- Header End -->


    <!-- about start -->

    <!-- About Start -->


    <!-- Tour Booking Start -->
    <div class="container-fluid booking py-5">
        <div class="container py-5">
            <!-- Display Success or Error Messages -->
            <?php if (isset($message)) { ?>
                <div class="alert alert-success"><?= $message; ?></div>
            <?php } ?>
            <?php if (isset($error)) { ?>
                <div class="alert alert-danger"><?= $error; ?></div>
            <?php } ?>
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h5 class="section-booking-title pe-3">Booking</h5>
                    <h1 class="text-white mb-4">Online Booking</h1>
                    
                </div>
                <div class="col-lg-6">
                    <h1 class="text-white mb-3">Book A Tour Deals</h1>
                    <p class="text-white mb-4">Get <span class="text-warning">10% Off</span> On Your First Adventure Trip With Desh-Tour. Get More Deal Offers Here.</p>
                    <!-- Booking Form -->
                    <form method="POST" action="booking.php">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="datetime-local" class="form-control" id="datetime" name="datetime" placeholder="Date & Time" required>
                                    <label for="datetime">Date & Time</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="destination" name="destination" required>
                                        <option value="Destination 1">kolkata</option>
                                        <option value="Destination 2">Digha</option>
                                        <option value="Destination 3">Goa</option>
                                    </select>
                                    <label for="destination">Destination</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="persons" name="persons" required>
                                        <option value="1">1 Person</option>
                                        <option value="2">2 Persons</option>
                                        <option value="3">3 Persons</option>
                                    </select>
                                    <label for="persons">Persons</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="Kids">Kids</option>
                                        <option value="Family">Family</option>
                                        <option value="Adventure">Adventure</option>
                                    </select>
                                    <label for="category">Category</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="special_request" name="special_request" placeholder="Special Request" style="height: 100px"></textarea>
                                    <label for="special_request">Special Request</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Tour Booking End -->



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