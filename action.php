<?php
session_start();
require('db_conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Signup Logic
    if (isset($_POST['sig'])) {
        $fullname = trim($_POST['fullname']);
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "Invalid email format";
            header("Location: siginup.php");
            exit;
        }

        // Check if email already exists
        $check_email = $conn->prepare("SELECT * FROM signup WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['message'] = "Email already in use";
            header("Location: siginup.php");
            exit;
        }

        // Hash the password and insert new user
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $insert_user = $conn->prepare("INSERT INTO signup (fullname, username, email, password, status) VALUES (?, ?, ?, ?, 1)");
        $insert_user->bind_param("ssss", $fullname, $username, $email, $hashed_password);

        if ($insert_user->execute()) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit;
        } else {
            $_SESSION['message'] = "Signup failed. Please try again.";
            header("Location: siginup.php");
            exit;
        }
    } 
    // Login Logic
    elseif (isset($_POST['log'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Fetch user details
        $check_user = $conn->prepare("SELECT * FROM signup WHERE email = ?");
        $check_user->bind_param("s", $email);
        $check_user->execute();
        $result = $check_user->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Check if user is active
            if ($user['status'] == 0) {
                $_SESSION['message'] = "Account is inactive. Please contact support.";
                header("Location: siginup.php");
                exit;
            }

            // Verify password
            if (password_verify($password, $user['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $user['username'];
                header("Location: index.php");
                exit;
            } else {
                $_SESSION['message'] = "Incorrect password. Please try again.";
                header("Location: siginup.php");
                exit;
            }
        } else {
            $_SESSION['message'] = "User not found. Please sign up.";
            header("Location: siginup.php");
            exit;
        }
    }
}
?>
