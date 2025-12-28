<?php
include("../connection/connection.php");
$idTodeleted  =  $_GET["id"];
$selectQuery=mysqli_query($con,"SELECT * FROM tbl_cart  where cart_id  = $idTodeleted ");
 if(mysqli_num_rows($selectQuery)==1){

 $data= (mysqli_fetch_assoc($selectQuery));
 $p_id = $data['p_id'];
 $qty = $data['qunatity'];
 $updateQuery=mysqli_query($con,"UPDATE `tbl_product` SET `quantity`= $qty WHERE `id`=$p_id");
 $query = "DELETE from tbl_cart where cart_id  = $idTodeleted";
$result=mysqli_query($con,$query);
if($query){
    echo "<script>
    window.location.href = 'cart.php';
</script>";
}
}


?>