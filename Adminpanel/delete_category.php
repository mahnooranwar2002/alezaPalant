<?php
include("../connection/connection.php");
$idTodeleted  =  $_GET["id"];

$query = "DELETE from tbl_category where category_id = $idTodeleted";
$result=mysqli_query($con,$query);
if($query){
    echo "<script>
    window.location.href = 'show_Category.php';
</script>";
} 
else{
    echo "<script>alert('The category is not deleted ');</script>";
    echo "<script>
    window.location.href = 'show_Category.php';
</script>";  
}
?>