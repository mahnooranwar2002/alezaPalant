<?php include('Navbar.php');
if (!isset($userRecord)) {
    echo "<script>window.location.href = '../Auth/login.php';</script>";
   
}

?>

    <div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>Wishlist</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Cart Area Start ##### -->
 <!-- Bootstrap Table (Responsive + Bordered + Striped + Hover Effect) -->
<div class="container mt-5">
    
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                 
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Static Rows (replace with PHP loop) -->
                <tr>
                <?php
                        $userId = $_SESSION["userLogined"] ?? null;
                        
                        if ($userId) {
                            $selectQuery = "SELECT * FROM tbl_wishlist WHERE user_id = $userId";
                            $result = mysqli_query($con, $selectQuery);

                            if (mysqli_num_rows($result) > 0) {
                                while ($data = mysqli_fetch_assoc($result)) {
                                    echo "<tr>
                                        <td>{$data['product_name']}</td>
                                        <td>
                                            <img src='../Adminpanel/assets/productImage/{$data['product_image']}' alt='{$data['product_name']}' style='height: 80px; width: 80px; object-fit: cover;'>
                                        </td>
                                        <td class='action'>
                                            <a href='remove_wishlist.php?id={$data['wishlist_id']}' class='btn btn-sm btn-danger'>
                                                <i class='icon_close'></i>
                                            </a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='3'>No products in your wishlist.</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Please login to view your wishlist.</td></tr>";
                        }
                        ?>
                   
                </tr>
               
                <!-- Add more rows dynamically using PHP -->
            </tbody>
        </table>
    </div>
</div>


<?php include('Footer.php');?>