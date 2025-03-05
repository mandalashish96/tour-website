<?php
require('com/essential.php');
require('com/db_conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_pannel</title>
    <?php
    include('com/header_link.php')

    ?>

    <style>
        body {
            background: url('assets/image/fll_bnn.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color:#0080FF;
            color: #fff;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            text-align: center;
            font-weight: bold;
            padding: 20px;
        }

        .social-icons i {
            font-size: 24px;
            color: white;
            margin: 0 10px;
        }

        .btn-primary {
            background-color: #0080FF;
            border: none;
            width: 100%;
            margin-top: 20px;
            padding: 10px;
        }

        .btn-primary:hover {
            background-color: #0FFBFF;
        }

        .text-muted {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>


<body class="">

    <div class="card" style="width: 550px;">
        <div class="card-header">
            Sign in
            <!-- <div class="social-icons mt-3">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-github"></i>
            <i class="bi bi-google"></i>
        </div> -->
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control" placeholder="name" required>
                </div>
                <div class="mb-3">
                    <input name="admin_pass" required type="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-check mb-3">
                    <input name="login" type="checkbox" class="form-check-input" id="rememberMe">
                    <label class="form-check-label" for="rememberMe" style="color:#fff;">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">SIGN IN</button>
            </form>

        </div>
    </div>

    <?php

    if (isset($_POST['login'])) {
        $frm_data = filteration($_POST);

        $query = "SELECT * FROM `admin_log` WHERE `name`=? AND `password`=?";
        $values = [$frm_data['admin_name'], $frm_data['admin_pass']];

        $res = select($query , $values, "ss");
        if ($res->num_rows == 1) {
            $row = mysqli_fetch_assoc($res);
            session_start();
            $_SESSION['adminLogin'] = true;
            $_SESSION['adminId'] = $row['id'];
            redirect('dashboard.php');
        } else {
            alert('error','login failed-Invalid credentials!');
         
        }
    }
    ?>



    <?php
    include('com/footer_link.php')

    ?>
</body>

</html>