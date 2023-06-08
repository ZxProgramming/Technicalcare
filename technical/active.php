<?php
include('../conn.php');
if (isset($_GET['id'])) {
    $tech_status_id = $_GET['id'];
    $status = $_GET['status'];

    $update_status = "UPDATE `technical` SET `status`='$status' WHERE `id`='$tech_status_id'";
    $q = $conn->prepare($update_status);
    $q->execute();
}
echo '<script>
                window.location.href="../profile.php"
                </script>';
// _________________________________________________________________________________________________________
if (isset($_GET['id_image'])) {
    $id_image = $_GET['id_image'];
    echo 'weeeeeeeeeeeeeeeeeeeeeeeeee';
    $delete_image = "DELETE  FROM `imagetechnical` WHERE `id`=$id_image";
    $q = $conn->prepare($delete_image);
    $q->execute();
}
