<?php include("header.php");?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-5">
               
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        User Data
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Is_active</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    
                                    <th>Email</th>
                                    <th>Is_active</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                           
                            $query = "SELECT * FROM tbl_user where is_admin = 0";
                         
                            $result = mysqli_query($con, $query);

                           
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                   $statusText = ($row['status'] == 1) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>';
                                    echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $statusText . "</td>";
                                    echo "<td>";
                                   
                                
                                    echo '<a href="status_user.php?id=' . $row['user_id'] . '&status=' . $row['status'] . '" class="btn btn-sm btn-success me-2"> Status</a>';

                                    echo '<a href="delete_user.php?id=' . $row['user_id'] . '" class="btn btn-sm btn-danger">Delete</a>';
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