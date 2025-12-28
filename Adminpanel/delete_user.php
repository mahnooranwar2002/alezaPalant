<?php
include("../connection/connection.php");
$idTodeleted  =  $_GET["id"];

$query = "DELETE from tbl_user where user_id = $idTodeleted";
$result=mysqli_query($con,$query);
if($query){
    echo "<script>
    window.location.href = 'show_user.php';
</script>";
}
?>