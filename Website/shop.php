  
<?php
include('Navbar.php');

?> 
   <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Shop</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Shop Area Start ##### -->
    <section class="shop-page section-padding-0-100">
        <div class="container">
            <div class="row">
                <!-- Shop Sorting Data -->
                <div class="col-12">
                    <div class="shop-sorting-data d-flex flex-wrap align-items-center justify-content-between">
                        <!-- Shop Page Count -->
                        
                        <!-- Search by Terms -->
                                            </div>
                </div>
            </div>

          
                        <div class="container" id="abc">

<?php
$query="SELECT * FROM tbl_product where status = 1 And quantity !=0 ";
$result=mysqli_query($con,$query);
foreach($result as $data){
    echo "<div class='product-card'>
        <div class='product-image-container'>
            
            <img id='product-img' src='../Adminpanel/assets/productImage/$data[product_image]' alt='$data[product_name]'>
        </div>
        <div class='product-details'>
           <a href='ProductData.php?id=$data[id]'>
           <h2 id='product-name'> $data[product_name]</h2>                                           
                                        </a>
      
           
    <div class='fle'>
                      <form method=post>
                                            <input type='hidden' name='p_id' value='$data[id]'>
                                            <input type='hidden' name='p_name' value='$data[product_name]'>
                                            <input type='hidden' name='product_image' value='$data[product_image]'>
                                            <button name='wishtlistBtn' class='cartBtn' style='height: 100%; padding: 10px;background-color: #70c745;color: white;border: none;outline: none;'><i class='icon_heart_alt'></i></button>
                                        </form>
   <a href='ProductData.php?id=$data[id]'>
                                             <h5 id='product-price'> $data[price]</h5>   
                                        </a>
                                              <form method=post>
                                            <input type='hidden' name='p_id' value='$data[id]'>
                                              <input type='hidden' name='p_name' value='$data[product_name]'>
                                            <input type='hidden' name='product_image' value='$data[product_image]'>
                                                 <input type='hidden' name='price' value='$data[price]'>
                                            <button name='cartBtn' class='cartBtn'  style='height: 100%; padding: 10px;background-color: #70c745;color: white;border: none;outline: none;'>
                                         <i class='ri-shopping-cart-line'></i>
                                            </button>
                                        </form>
                                 
         
             </div>
            </div>
      
    </div>";}
    
    
    
    
    ?>

                        

                        
                        </div>

                        <!-- Pagination -->
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php
include('Footer.php');

if(isset($_POST["wishtlistBtn"])){
if(isset($_SESSION["userLogined"])){
    $userId=$_SESSION["userLogined"];
$pName=$_POST['p_name'];
$pId=$_POST['p_id'];
$pImage=$_POST['product_image'];
    $checkQury="SELECT * FROM  tbl_wishlist where user_id =$userId AND  product_id =$pId ";
$productexsisting=mysqli_query($con,$checkQury);
  if(mysqli_num_rows($productexsisting)==1){
    echo "<script>alert('This product is already added in your wishlist');</script>";
  }else{
$query="INSERT INTO `tbl_wishlist`( `user_id`, `product_id`, `product_name`, `product_image`) VALUES ('$userId','$pId','$pName','$pImage')";
$result=mysqli_query($con,$query);
if($result){
    echo "<script>alert('product is added in your wishlist');</script>";
}


  }


}else{
    echo "<script>alert('first login for add product in wishlist');</script>";
}
}


if(isset($_POST["cartBtn"])){
if(isset($_SESSION["userLogined"])){
    $userId=$_SESSION["userLogined"];
$pName=$_POST['p_name'];
$pId=$_POST['p_id'];
$price=$_POST['price'];
$pImage=$_POST['product_image'];
    $checkQury="SELECT * FROM  tbl_cart where user_id =$userId AND  p_id =$pId ";
$productexsisting=mysqli_query($con,$checkQury);
  if(mysqli_num_rows($productexsisting)==1){
    echo "<script>alert('This product is already added in your cart');</script>";
  }else{
    $total=$price * 1;
  $SelectQuery=mysqli_query($con,"SELECT * FROM tbl_product where id =$pId");
   if(mysqli_num_rows($SelectQuery)==1){

 $data= (mysqli_fetch_assoc($SelectQuery));
 
if( $data['quantity']>=1)
    {
        $query="INSERT INTO `tbl_cart`( `p_id`, `user_id`, `p_name`, `p_image`, `qunatity`, `price`, `total`) VALUES ('$pId','$userId','$pName','$pImage',1,$price,$total)";
        $updateQuery="UPDATE `tbl_product` SET `quantity`= $data[quantity]-1 WHERE `id`=$pId";
        $result=mysqli_query($con,$query);
        $result=mysqli_query($con,$updateQuery);
        if($result){
    echo "<script>alert('The product is added in your cart');</script>";
}
} else{
  echo "<script>alert('aaaa');</script>";   
}
}





  }


}else{
    echo "<script>alert('first login for add product in wishlist');</script>";
}
}
?>

<style>
    .product-card {
        margin: 0px 20px;
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    width: 320px;
    overflow: hidden; /* Ensures borders are rounded */
    transition: transform 0.3s ease;
}

.product-card:hover {
    transform: translateY(-5px); /* Lift effect on hover */
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
}

.product-image-container {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.product-image-container img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the area without distortion */
}

.product-details {
    padding: 20px;
    text-align: center;
}

#product-name {
    font-size: 1.5rem;
    color: #333;
    margin-top: 0;
    margin-bottom: 10px;
}

.product-price {
    font-size: 1.8rem;
    color: #007bff; /* Blue color for emphasis */
    font-weight: bold;
    margin-bottom: 15px;
}

.product-description {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 20px;
    line-height: 1.5;
}

.add-to-cart-btn {
    background-color: #28a745; /* Green button */
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    font-weight: 600;
    transition: background-color 0.2s;
    width: 100%;
    margin-bottom: 15px;
}

.add-to-cart-btn:hover {
    background-color: #218838;
}
#abc{

    display: flex;
    justify-content: center;
    align-items:center ;
    flex-wrap: wrap;
}
.product-rating {
    color: gold;
    font-size: 1.1rem;
}
.fle{

display: flex;
justify-content: space-between;
align-items: center;
gap: 10px;
}
.cartBtn{
padding: 20px;
border-radius: 25%;

}</style>
