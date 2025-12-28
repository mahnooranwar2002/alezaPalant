  
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

            <div class="row">
                <!-- Sidebar Area -->
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop-sidebar-area">

                        <!-- Shop Widget -->
                        <div class="shop-widget price mb-50">
                            <h4 class="widget-title">Prices</h4>
                            <div class="widget-desc">
                                <div class="slider-range">
                                    <div data-min="8" data-max="30" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="8" data-value-max="30" data-label-result="Price:">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all first-handle" tabindex="0"></span>
                                        <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    </div>
                                    <div class="range-price">Price: $8 - $30</div>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget catagory mb-50">
                            <h4 class="widget-title">Categories</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">All plants <span class="text-muted">(72)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Outdoor plants <span class="text-muted">(20)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Indoor plants <span class="text-muted">(15)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4">
                                    <label class="custom-control-label" for="customCheck4">Office Plants <span class="text-muted">(20)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                                    <label class="custom-control-label" for="customCheck5">Potted <span class="text-muted">(15)</span></label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6">
                                    <label class="custom-control-label" for="customCheck6">Others <span class="text-muted">(2)</span></label>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget sort-by mb-50">
                            <h4 class="widget-title">Sort by</h4>
                            <div class="widget-desc">
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                    <label class="custom-control-label" for="customCheck7">New arrivals</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck8">
                                    <label class="custom-control-label" for="customCheck8">Alphabetically, A-Z</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9">
                                    <label class="custom-control-label" for="customCheck9">Alphabetically, Z-A</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10">
                                    <label class="custom-control-label" for="customCheck10">Price: low to high</label>
                                </div>
                                <!-- Single Checkbox -->
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11">
                                    <label class="custom-control-label" for="customCheck11">Price: high to low</label>
                                </div>
                            </div>
                        </div>

                        <!-- Shop Widget -->
                        <div class="shop-widget best-seller mb-50">
                            <h4 class="widget-title">Best Seller</h4>
                            <div class="widget-desc">

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="img/bg-img/4.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Cactus Flower</a>
                                        <p>$10.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="img/bg-img/5.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Tulip Flower</a>
                                        <p>$11.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Single Best Seller Products -->
                                <div class="single-best-seller-product d-flex align-items-center">
                                    <div class="product-thumbnail">
                                        <a href="shop-details.html"><img src="img/bg-img/34.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <a href="shop-details.html">Recuerdos Plant</a>
                                        <p>$9.99</p>
                                        <div class="ratings">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- All Products Area -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop-products-area">
                        <div class="row">
<?php
$query="SELECT * FROM tbl_product where status = 1 And quantity !=0 ";
$result=mysqli_query($con,$query);
foreach($result as $data){
    echo "
     <div class='col-12 col-sm-6 col-lg-4'>
                                <div class='single-product-area mb-50'>
                                  
                                    <div class='product-img'>
                                        <a href='ProductData.php?id=$data[id]'><img src='../Adminpanel/assets/productImage/$data[product_image]' ></a>
                                     
                                        <div class='product-tag'>
                                            <a href='#'>Hot</a>
                                        </div>
                                        <div class='product-meta d-flex'>
                                      
                                           
                                          
                                        </div>
                                    </div>
                                  
                                    <div class='product-info mt-15 text-center d-flex justify-content-between '>
                                    
                                          <form method=post>
                                            <input type='hidden' name='p_id' value='$data[id]'>
                                            <input type='hidden' name='p_name' value='$data[product_name]'>
                                            <input type='hidden' name='product_image' value='$data[product_image]'>
                                            <button name='wishtlistBtn'  style='height: 100%; padding: 10px;background-color: black;color: white;border: none;outline: none;'><i class='icon_heart_alt'></i></button>
                                        </form>
   <a href='ProductData.php?id=$data[id]'>
                                            <p >$data[product_name]</p>
                                        </a>
                                              <form method=post>
                                            <input type='hidden' name='p_id' value='$data[id]'>
                                              <input type='hidden' name='p_name' value='$data[product_name]'>
                                            <input type='hidden' name='product_image' value='$data[product_image]'>
                                                 <input type='hidden' name='price' value='$data[price]'>
                                            <button name='cartBtn'  style='height: 100%; padding: 10px;background-color: black;color: white;border: none;outline: none;'>
                                         <i class='ri-shopping-cart-line'></i>
                                            </button>
                                        </form>
                                    </div>
                                       <h6 class='text-center'>$ $data[price]</h6>
                                </div>
                            </div>
    
    ";
}

?>
                            <!-- Single Product Area -->
                        

                        
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </nav>
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
