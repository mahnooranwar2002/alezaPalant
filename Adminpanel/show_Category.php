<?php include("header.php");?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-5">
                <div class="card-header bg-primary text-white">
                    Category List
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Category Data
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Is_active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Is_active</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                           
                            $query = "SELECT * FROM `tbl_category`";
                         
                            $result = mysqli_query($con, $query);

                           
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                   $statusText = ($row['is_active'] == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>';
                                    echo "<tr>";
                                    echo "<td>" . $row['category_name'] . "</td>";
                                    echo "<td>" . $statusText . "</td>";
                                    echo "<td>";
                                   
                                    echo '<a href="edit_category.php?id=' . $row['category_id'] . '" class="btn btn-sm btn-primary me-2">Edit</a>';
                                    echo '<a href="status_category.php?id=' . $row['category_id'] . '&status=' . $row['is_active'] . '" class="btn btn-sm btn-success me-2"> Status</a>';

                                    echo '<a href="delete_category.php?id=' . $row['category_id'] . '" class="btn btn-sm btn-danger">Delete</a>';
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