<?php
include("../connection/connection.php");


if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = (int)$_GET['id'];
    $currentStatus = (int)$_GET['status'];

 
    $newStatus = ($currentStatus === 1) ? 0 : 1;

   
    $query = "UPDATE `tbl_category` SET `is_active` = $newStatus WHERE `category_id` = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: show_Category.php");
        exit();
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
