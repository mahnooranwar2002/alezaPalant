<?php include("header.php");
$id=$_GET["id"];
$query="SELECT * from tbl_product where id=$id";
$result=mysqli_query($con,$query);
$data= (mysqli_fetch_assoc($result));



?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <div class="card mb-4 mt-5">
                            <div class="card-header bg-primary text-white">
                                
                                Update Products 
                            </div>
                            <div class="card-body">
                            <form method="post" enctype="multipart/form-data">

<div class="mb-3 text-center">
                          

<?php
 echo "<td><img src='assets/productImage/" . htmlspecialchars($data['product_image']) . "' width='150' height='150'></td>";
?>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Product Name</label>
  <input type="text" name="name"  value="<?php echo htmlspecialchars($data['product_name']); ?>" class="form-control" id="exampleFormControlInput1" placeholder="Enter name">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Price </label>
  <input type="text" name="price" value="<?php echo htmlspecialchars($data['price']); ?>" class="form-control" id="exampleFormControlInput1" placeholder="Enter price">
</div>
<label for="exampleFormControlInput1" class="form-label">Category </label>

<select name="cate" id="" class="form-control">

<?php
 $query = "SELECT * FROM `tbl_category` where is_active = 1";
                         
 $result = mysqli_query($con, $query);
 if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <option value=<?php echo $row['category_id'] ?> <?php if($data['cate_id'] ==$row['category_id']) echo 'selected' ?> <?php echo $row['category_id'] ?>>
      <?php echo $row['category_name'] ?></option>
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
  <input type="text" name="quantity" class="form-control" value="<?php echo htmlspecialchars($data['quantity']); ?>"  id="exampleFormControlInput1" placeholder="Enter qunatity">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Image </label>
  <input type="file" name="img" class="form-control" id="exampleFormControlInput1" placeholder="Enter qunatity">
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Products Status</label>
  <select class="form-select" name="status" required>
          <option hidden>Select status</option>
          <option value="1" <?php if ($data['status'] == 1) echo 'selected'; ?>>Active</option>
         <option value="0" <?php if ($data['status'] == 0) echo 'selected'; ?>>Deactive</option>
             </select>
</div>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Description </label>

  <textarea class="form-control"  id="exampleFormControlTextarea1" rows="3" name="des"><?php echo htmlspecialchars($data['description']); ?></textarea>
</div>
<div class="mb-3">
 
  <input type="submit" name="add_btn" class="form-control btn btn-primary"  value="Save">
</div>


                            </form>
                            </div>
                        </div>
                      
                    </div>
                </main>
               
<?php include("footer.php");


if (isset($_POST["add_btn"])) {
   
    $productname = $_POST["name"];
    $productStatus = $_POST["status"];
    $productprice = $_POST["price"];
    $productquantity = $_POST["quantity"];
    $category = $_POST["cate"];
    $des = $_POST['des'];

    $fetchQuery = "SELECT product_image FROM tbl_product WHERE id = $id";
    $fetchResult = mysqli_query($con, $fetchQuery);
    $data = mysqli_fetch_assoc($fetchResult);
    $imageIndb = $data['product_image'];


    if (!empty($_FILES["img"]["name"])) {
        $newImageName = $_FILES["img"]["name"];
        $newimageTemp = $_FILES["img"]["tmp_name"];
        $folder = "assets/productImage/" . $newImageName;

       
        if (move_uploaded_file($newimageTemp, $folder)) {
        
        } else {
            echo "<script>alert('Image upload failed');</script>";
            exit();
        }
    } else {
        $newImageName = $imageIndb; 
    }

 
    $query = "UPDATE `tbl_product` SET
                `product_name` = '$productname',
                `description` = '$des',
                `product_image` = '$newImageName',
                `cate_id` = '$category',
                `status` = '$productStatus',
                `price` = '$productprice',
                `quantity` = '$productquantity'
              WHERE id = $id";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>alert('The product is updated now'); window.location.href='show_product.php';</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

 

