



<?php


include('../conn.php');

$tech_id = $_GET['id'];
$client_id = $_GET['client_id'];
$status = $_GET['status'];

$update_status = "UPDATE `order` SET `status`='$status' WHERE `technical_id`='$tech_id' And `client_id`='$client_id'";
$q = $conn->prepare($update_status);
$q->execute();
header('location:../profile.php');



?>