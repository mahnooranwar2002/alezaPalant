<?php include("header.php");?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-5">
                <div class="card-header bg-primary text-white">
                    Contact List
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Contact Data
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                           
                            $query = "SELECT * FROM `tbl_contact`";
                         
                            $result = mysqli_query($con, $query);

                           
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                   echo "<tr>";
                                    echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['subject'] . "</td>";
                                    echo "<td>" . $row['msg'] . "</td>";
                                    
                                  


                                    echo "<td>";
                                   
                                  
                                    echo '<a href="delete_category.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger">Delete</a>';
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