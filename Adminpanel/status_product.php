<?php
include("../connection/connection.php");


if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = (int)$_GET['id'];
    $currentStatus = (int)$_GET['status'];

 
    $newStatus = ($currentStatus === 1) ? 0 : 1;

   
    $query = "UPDATE `tbl_product` SET `status` = $newStatus WHERE `id` = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: show_product.php");
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
