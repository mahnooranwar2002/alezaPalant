<?php
include("../connection/connection.php");
$idTodeleted  =  $_GET["id"];
$imageData= mysqli_query($con,"SELECT product_image from tbl_product where id= $idTodeleted ");
$imageData=mysqli_fetch_assoc($imageData);

$file_Path ='assets/productImage/'. $imageData['product_image'];
if(file_exists($file_Path)){
    unlink($file_Path);
    $query = "DELETE from tbl_product where id = $idTodeleted";
$result=mysqli_query($con,$query);
if($result){
    echo "<script>
    window.location.href = 'show_product.php';
</script>";
}}


// $query = "DELETE from tbl_product where id = $idTodeleted";
// $result=mysqli_query($con,$query);
// if($query){
//     echo "<script>
//     window.location.href = 'show_product.php';
// </script>";
// }
?>