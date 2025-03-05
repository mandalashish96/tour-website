<?php
// Include database connection
include('db_conn.php');

// Initialize variables for error messages
$error_message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate form data
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = 'All fields are required!';
    } else {
        // Insert data into the database
        $sql = "INSERT INTO contacts (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        if ($conn->query($sql) === TRUE) {
            // Redirect with success flag and name
            header('Location: ' . $_SERVER['PHP_SELF'] . '?success=true&name=' . urlencode($name));
            exit();
        } else {
            $error_message = 'Error: ' . $conn->error;
        }
    }
}

// Get success flag and name from URL
$success = isset($_GET['success']) && $_GET['success'] === 'true';
$popup_name = $success && isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <?php
    include('com/navbar.php');
    include('com/header_link.php');
    ?>

    <script>
        // Function to show popup after successful submission
        function showPopup(name) {
            const popup = document.getElementById('popup');
            const popupName = document.getElementById('popup-name');
            const popupMessage = document.getElementById('popup-message');
            popupName.textContent = name;
            popupMessage.textContent = "Your message has been sent successfully!";
            popup.style.display = "block"; // Show the popup
        }

        // Close popup
        function closePopup() {
            const popup = document.getElementById('popup');
            popup.style.display = "none"; // Hide the popup
        }
    </script>
</head>

<style>
    /*** Facts ***/
    .fact {
        background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url(assets/img/indbg.webp) center center no-repeat;
        background-size: cover;
    }

    /* Popup Style */
    #popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }

    #popup .popup-content {
        text-align: center;
    }

    #popup .popup-content h3 {
        margin-bottom: 20px;
    }

    #popup .popup-content button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #popup .popup-content button:hover {
        background-color: #0056b3;
    }
</style>

<body>
    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb-2">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Contact Us</h1>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <!-- Success/Error Messages -->
    <?php
    if (!empty($error_message)) {
        echo "<div class='alert alert-danger'>$error_message</div>";
    }

    // Trigger popup if success flag is true
    if ($success && $popup_name) {
        echo "<script>window.onload = function() { showPopup('$popup_name'); }</script>";
    }
    ?>

    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Contact Us</h5>
                <h1 class="mb-0">Contact For Any Query</h1>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-4">
                    <div class="bg-white rounded p-4">
                        <div class="text-center mb-4">
                            <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                            <h4 class="text-primary">Address</h4>
                            <p class="mb-0">Madhakhali, <br> Bhupatinagar, IND</p>
                        </div>
                        <div class="text-center mb-4">
                            <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                            <h4 class="text-primary">Mobile</h4>
                            <p class="mb-0">+91 9647145300</p>
                        </div>
                        <div class="text-center">
                            <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                            <h4 class="text-primary">Email</h4>
                            <p class="mb-0">ashishmandal093@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">

                    <form method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control border-0" id="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control border-0" id="email" placeholder="Your Email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" name="subject" class="form-control border-0" id="subject" placeholder="Subject" required>
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 160px" required></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <div class="rounded">
                        
                        <iframe class="rounded w-100" style="height: 450px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14796.93429290925!2d87.73606029368213!3d22.002359623445606!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02db1a0260e821%3A0x4355541c8bbb02ee!2sMadha%20Khali%2C%20West%20Bengal!5e0!3m2!1sen!2sin!4v1734958606148!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Popup Modal -->
    <div id="popup">
        <div class="popup-content">
            <h3>Hello, <span id="popup-name"></span>!</h3>
            <p id="popup-message"></p>
            <button onclick="closePopup()">Close</button>
        </div>
    </div>

    <?php
    include('com/footer.php');
    include('com/footer_link.php');
    ?>

</body>

</html>