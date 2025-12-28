<?php include("header.php");?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-5">
                <div class="card-header bg-primary text-white">
                    Product List
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Product Data
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Qunatity</th>
                                    <th>status</th>
                                    <th>Category</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Qunatity</th>
                                    <th>Category</th>
                                    
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                           
                            $query = "SELECT * FROM `tbl_product` INNER join tbl_category on tbl_product.cate_id=tbl_category.category_id";
                         
                            $result = mysqli_query($con, $query);

                           
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                   $statusText = ($row['status'] == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>';
                                    echo "<tr>";
                                    echo "<td>" . $row['product_name'] . "</td>";
                                    echo "<td><img src='assets/productImage/" . htmlspecialchars($row['product_image']) . "' width='80' height='80'></td>";
                                    echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['quantity'] . "</td>";
                                   
                                    
                                    echo "<td>" . $statusText . "</td>";
                                    echo "<td>" . $row['category_name'] . "</td>";   
                                    echo "<td>";
                                    echo '<a href="edit_product.php?id=' . $row['id'] . '" class="btn btn-sm btn-primary me-2"> Edit</a>';

                                    echo '<a href="status_product.php?id=' . $row['id'] . '&status=' . $row['status'] . '" class="btn btn-sm btn-success me-2"> Status</a>';

                                    echo '<a href="delete_product.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger">Delete</a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                              
                            
                            } else {
                              
                                echo '<tr><td colspan="3" class="text-center">No categories found.</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
<?php include("footer.php");?>
