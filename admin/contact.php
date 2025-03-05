<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'plugin/PHPMailer/src/Exception.php';
require 'plugin/PHPMailer/src/PHPMailer.php';
require 'plugin/PHPMailer/src/SMTP.php';

require('com/essential.php');
require('com/db_conn.php');
adminLogin();

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_sql = "DELETE FROM contacts WHERE id = $id";
    if ($conn->query($delete_sql) === TRUE) {
       
    } else {
        echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
    }
}

// Handle reply email
if (isset($_POST['send_reply'])) {
    $user_email = $_POST['user_email'];
    $reply_message = $_POST['reply_message'];

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = 0;

        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'tody096@gmail.com';
        $mail->Password = 'dmws wigs itik xhri'; // Replace with App Password from Google
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email Settings
        $mail->setFrom('tody096@gmail.com', 'Admin');
        $mail->addAddress($user_email);
        $mail->isHTML(true);
        $mail->Subject = "Reply from Admin";
        $mail->Body = "<p>Dear User,</p><p>$reply_message</p><p>Best Regards,<br>Your Website Team</p>";

        $mail->send();
        echo "<div class='alert alert-success'>Reply sent successfully!</div>";
    } catch (Exception $e) {
        echo "<div class='alert alert-danger'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
    }
}

// Fetch all messages
$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <?php require('com/header_link.php'); ?>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</head>

<body>

    <?php require('com/header.php'); ?>

    <div class="container mt-5">
        <h2 class="mb-4">Contact Messages</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td>
                                <a href="?delete=<?php echo $row['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirmDelete()">Delete</a>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $row['id']; ?>">Reply</button>
                            </td>
                        </tr>

                        <!-- Reply Modal -->
                        <div class="modal fade" id="replyModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="replyModalLabel">Reply to <?php echo $row['name']; ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_email" value="<?php echo $row['email']; ?>">
                                            <div class="mb-3">
                                                <label for="reply_message" class="form-label">Message</label>
                                                <textarea class="form-control" id="reply_message" name="reply_message" rows="4" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="send_reply" class="btn btn-primary">Send Reply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='6'>No messages found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <?php require('com/footer_link.php'); ?>
</body>

</html>