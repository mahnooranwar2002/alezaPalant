<?php include('Navbar.php');

$userRecord=$_SESSION["userLogined"] ;

// for prevent the user to wiythout login;
if (!isset($userRecord)) {
    echo "<script>window.location.href = '../Auth/login.php';</script>";
   
}



       $sumquery = "SELECT SUM(total) AS total_amount FROM tbl_cart where user_id =$userRecord ";
                    $outcome = mysqli_query($con, $sumquery);
                    
                    if ($outcome) {
                        $row = mysqli_fetch_assoc($outcome);
                        $totalAmount = $row['total_amount'];
                    } 
                    
                
                  ?>
    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Cart</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
 <div class="container mt-5">   <!-- ##### Breadcrumb Area End ##### -->
  <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center align-middle">
            <thead class="table-dark">
             
                                <tr>
                                    <th>Products</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>TOTAL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
      
            <tbody>
              <?php
    // Get user ID from session, defaults to null
    $userId = $_SESSION["userLogined"] ?? null;

    if ($userId) {
      
        $selectQuery = "SELECT * FROM tbl_cart WHERE user_id = $userId";
        $result = mysqli_query($con, $selectQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
                // *** FIX: Create a unique ID for the quantity input field ***
                $qty_id = "qty_{$data['cart_id']}"; 
                
                echo "<tr>
                    <td>
                      
                        <img src='../Adminpanel/assets/productImage/{$data['p_image']}' alt='{$data['p_name']}' style='height: 80px; width: 80px; object-fit: cover;'>
                          
                        {$data['p_name']}
                    </td>
                    <td class='qty'>
                        <div class='quantity'>
                       
                            <form method='post'>
                                <input type='hidden' value='{$data['p_id']}' name='pId'>
                                <input type='hidden' value='{$data['cart_id']}' name='cId'>
                                
                            <input type='text' class='qty-text' id='$qty_id' step='1' min='1' max='99' name='quantity' value='{$data['qunatity']}' style='text-align: center;'>
                            <input type='submit' value='update' class='btn btn-primary' name='updateBtn'>
                            </form>
                       
                        </div>
                    </td>
                    <td class='price'><span>{$data['price']}</span></td>
                    <td class='price'><span>{$data['total']}</span></td>
                    <td class='action'>
                        <a href='remove_cart.php?id={$data['cart_id']}' >
                            <i class='icon_close'></i>
                        </a>
                    </td>
                </tr>";
            }
        } else {
            // Check if the query failed or if no rows were returned
            echo "<tr><td colspan='5'>No products in your Cart.</td></tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Please login to view your wishlist.</td></tr>";
    }
               
            ?>
            </tbody>
        </table>
    </div>
    <div class="container mt-5 mb-3">
    <div class="row">

<!-- Coupon Discount -->
<div class="col-12 col-lg-6">
    <div class="coupon-discount mt-70">
        <h5>COUPON DISCOUNT</h5>
        <p>Coupons can be applied in the cart prior to checkout. Add an eligible item from the booth of the seller that created the coupon code to your cart. Click the green "Apply code" button to add the coupon to your order. The order total will update to indicate the savings specific to the coupon code entered.</p>
        <form action="#" method="post">
            <input type="text" name="coupon-code" placeholder="Enter your coupon code">
            <button type="submit">APPLY COUPON</button>
        </form>
    </div>
</div>

<!-- Cart Totals -->
<div class="col-12 col-lg-6">
    <div class="cart-totals-area mt-70">
        <h5 class="title--">Cart Total</h5>
        <div class="subtotal d-flex justify-content-between">
            <h5>Subtotal</h5>
            <h5><?php
            echo $totalAmount?></h5>
        </div>
   
        </div>
        <div class="total d-flex justify-content-between">
            <h5>Total</h5>
            <h5><?php
            echo $totalAmount?></h5>
        </div>
        <div class="checkout-btn">
           
            <a href="Checkout.php" class="btn alazea-btn w-100">PROCEED TO CHECKOUT</a>
        </div>
    </div>
</div>
</div>
</div>
</div>

                    </div>


<?php include('Footer.php');

if(isset($_POST['updateBtn'])){
    $pId=$_POST['pId'];
     $Id=$_POST['cId'];
     $c_quantity=$_POST['quantity'];

     $query=mysqli_query($con,"SELECT * FROM tbl_product WHERE id=$pId");
     if(mysqli_num_rows($query)==1){

 $data= (mysqli_fetch_assoc($query));}
if( $data['quantity'] >= $c_quantity){
     $total=$data['price']*$c_quantity;
     $updateQuery=mysqli_query($con,"UPDATE `tbl_product` SET `quantity`= $data[quantity]- $c_quantity WHERE `id`=$pId");
     $updatecart="UPDATE `tbl_cart` SET `qunatity`='$c_quantity',`total`=$total WHERE  `cart_id`=$Id";
    $result=mysqli_query($con,$updatecart);
    
    if($result){
   echo "<script>alert('The Quantity of product is  updated in your cart');</script>";
       echo "<script>
    window.location.href = 'cart.php';
</script>";
}
}else{
     echo "<script>alert('Sorry, we do not have $c_quantity quantity.');</script>";  
}
}

?>
<style>
    .btn-primary{
        background-color:#70c745 ;
        border: #70c745;
    }
        .btn-primary:hover{
        background-color:#70c745 ;
        border: #70c745;
    }
</style>