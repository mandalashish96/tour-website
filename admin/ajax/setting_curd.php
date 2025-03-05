<?php
require('../com/essential.php');
require('../com/db_conn.php');

adminLogin();

// Fetch general settings
if (isset($_POST['get_general']) && $_POST['get_general'] == 'true') {
    $q = "SELECT * FROM `setting` WHERE `id`=?";
    $values = [1];
    $res = select($q, $values, "i");
    $data = mysqli_fetch_assoc($res);
    echo json_encode($data);
    exit;
}

// Update general settings
if (isset($_POST['upd_genral']) && $_POST['upd_genral'] == 'true') {
    $frm_data = filteration($_POST);
    $q = "UPDATE `setting` SET `title`=? WHERE `id`=?";
    $values = [$frm_data['title'], 1];
    $res = update($q, $values, 'si');
    echo $res ? 1 : 0; // 1 for success, 0 for failure
    exit;
}

if (isset($_POST['upd_shutdown'])) {
    $frm_data = ($_POST['upd_shutdown']==0) ? 1 : 0;
    $q = "UPDATE `setting` SET `shutdown`=? WHERE `id`=?";
    $values = [$frm_data, 1];
    $res = update($q, $values, 'si');
    echo $res ? 1 : 0; // 1 for success, 0 for failure
    exit;
}
?>
