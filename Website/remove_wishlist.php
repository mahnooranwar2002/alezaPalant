<?php
include("../connection/connection.php");
$idTodeleted  =  $_GET["id"];

$query = "DELETE from tbl_wishlist where wishlist_id = $idTodeleted";
$result=mysqli_query($con,$query);
if($query){
    echo "<script>
    window.location.href = 'wishlist.php';
</script>";
}
?>