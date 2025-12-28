<?php include("header.php");



?>
<style>
  #error{
    display: none;
  }
</style>
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="card mb-4 mt-5">
                            <div class="card-header bg-primary text-white">
                                
                                Add Products 
                            </div>
                            <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Product Name</label>
  <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter name"   pattern="^[A-Za-z\s]{3,50}$" 
  title="Name must be 3-50 characters long and contain only letters and spaces" >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Price </label>
  <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="Enter price"  pattern="^\d+(\.\d{1,2})?$" 
  title="Enter a valid price (e.g. 100 or 99.99)" >
</div>
<label for="exampleFormControlInput1" class="form-label">Category </label>

<select name="cate" id="" class="form-control">
<option selected hidden>Open this select menu</option>
<?php
 $query = "SELECT * FROM `tbl_category` where is_active = 1";
                         
 $result = mysqli_query($con, $query);
 if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
 <option value=<?php echo $row['category_id'] ?>>
    <?php echo $row['category_name'] ?>
    </option>


      <?php 
    }
  

} 
?>
</select>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">qunatity </label>
  <input type="text" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="Enter qunatity"  pattern="^\d+(\.\d{1,2})?$" 
  title="Enter a valid price (e.g. 100 or 99.99)" >
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image </label>
  <input type="file" name="img" class="form-control" id="exampleFormControlInput1" placeholder="Enter qunatity">
</div>
<p class="text-danger" id="error">This image format is not supported  </p>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Products Status</label>
  <select class="form-select" name="status"  aria-label="Default select example">
  <option selected hidden>Open this select menu</option>
  <option value=1>Active</option>
  <option value=0>Deacctive</option>
 
</select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description </label>

  <textarea 
  class="form-control" 
  id="exampleFormControlTextarea1" 
  rows="5" 
  name="des" 
  required
  placeholder="Enter description">
</textarea>

</div>
<div class="mb-3">
 
  <input type="submit" name="add_btn" class="form-control btn btn-primary"  value="Save">
</div>


                            </form>
                            </div>
                        </div>
                      <a href="assets/productImage/"></a>
                    </div>
                </main>
               
<?php include("footer.php");
if(isset($_POST["add_btn"])){
  $productname=$_POST["name"];
  $productStatus=$_POST["status"];
  $productprice=$_POST["price"];
  $productquantity=$_POST["quantity"];
  $category=$_POST["cate"];
  $imageName=$_FILES["img"]["name"];
  $imagetemp=$_FILES["img"]["tmp_name"];

  // for find out the pic extension
$extension=pathinfo($imageName,PATHINFO_EXTENSION);
$format=["jpg","png","jpeg"];
   $des=$_POST['des'];
$nameValidate="SELECT * from tbl_product  where product_name = '$productname'";
$NameResult= mysqli_query($con,$nameValidate);
if( mysqli_num_rows($NameResult) == 1){
  echo  "<script>
  alert('The product is already added now');
</script>"; 
}
else{
 
  if(!in_array($extension,$format)){
    echo "<script>
    document.getElementById('error').style.display = 'initial';
 </script>";

  }else{
    $R_num=rand(100000, 999999);
    $imageName=$R_num. "." .$extension; 
        // assets/productImage/
        $folder= "assets/productImage/".$imageName;
        move_uploaded_file($imagetemp,$folder);
      $query="INSERT INTO `tbl_product`( `product_name`, `description`, `product_image`, `cate_id`, `status`, `price`, `quantity`) VALUES ('$productname','$des','$imageName',$category,'$productStatus','$productprice','$productquantity')";
      
      $result = mysqli_query($con,$query);
    if($result){
      echo  "<script>
               alert('The product is added now');
            </script>"; 
    }
  }


}
 

  
}

?>