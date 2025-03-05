<?php
require('com/essential.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php
    require('com/header_link.php');
    ?>
</head>

<body>
    <?php
    require('com/header.php');
    ?>

    <h3 class="mb-4">Settings</h3>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">General Settings</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#general-modal">
                        Edit
                    </button>
                </div>
                <h6 class="card-subtitle mb-1 font-bold">Site Settings</h6>
                <p class="card-text" id="title"></p>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="general-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">General Settings</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Site Title</label>
                            <input name="title" id="site_title_inp" type="text" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="site_title_inp.value = genral_data.title" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" onclick="upd_genral(site_title_inp.value)" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- shutdown -->


    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded-top p-4">
            <div class="row">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="card-title m-0">Shutdown website</h5>
                    <!-- Button trigger modal -->
                    <div class="form-check form-switch">
                        <form action="">
                            <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                        </form>
                    </div>

                </div>

                <p class="card-text">
                    not booking website is now down
                </p>
            </div>
        </div>
    </div>

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