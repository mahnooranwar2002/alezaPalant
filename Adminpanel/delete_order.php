<?php
include("../connection/connection.php");
$idTodeleted  =  $_GET["id"];

$query = "DELETE from tbl_orders where order_id = $idTodeleted";
$result=mysqli_query($con,$query);
if($query){
    echo "<script>
    window.location.href = 'order_details.php';
</script>";
}
?>