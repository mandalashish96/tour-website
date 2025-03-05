<?php
require('com/essential.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carsousel - Dashboard</title>
    <?php
    require('com/header_link.php');
    ?>
</head>

<body>
    <?php
    require('com/header.php');
    ?>

   

    <!-- shutdown end -->

    <?php
    require('com/footer_link.php');
    ?>

    <script>
        let genral_data;

        // Fetch general settings from the server
        function get_genral() {
            let title = document.getElementById('title');
            let site_title_inp = document.getElementById('site_title_inp');

            let shutdown_toggle = document.getElementById('shutdown-toggle');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/setting_curd.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                genral_data = JSON.parse(this.responseText);
                title.innerText = genral_data.title;
                site_title_inp.value = genral_data.title;

                if (genral_data.shutdown == 0) {
                    shutdown_toggle.checked = false;
                    shutdown_toggle.value = 0;

                } else {
                    shutdown_toggle.checked = true;
                    shutdown_toggle.value = 1;
                }
            };

            xhr.send('get_general=true');
        }

        // Update general settings
        function upd_genral(title_val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/setting_curd.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                var myModal = document.getElementById('general-modal');
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide();

                if (this.responseText == '1') {
                    alert('success', 'changes saved!');
                    get_genral();
                } else {
                    alert('error', ' No changes saved!');
                }
            };

            xhr.send('title=' + title_val + '&upd_genral=true');
        }

        function upd_shutdown(val) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/setting_curd.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {


                if (this.responseText == 1 && genral_data.shutdown==0) {
                    alert( 'site has been shutdown!');
                    
                } else {
                    alert( ' shutdown mode off!');
                }
                get_genral();
            };
            xhr.send('upd_shutdown='+val);


        }

        window.onload = function() {
            get_genral();
        };
    </script>


</body>

</html>