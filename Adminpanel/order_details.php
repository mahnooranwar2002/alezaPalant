<?php 
// Assuming header.php handles session start and connection setup ($con)
include("header.php");

// --- Define the SELECT Query ---
// NOTE: Make sure your tbl_orders table has 'products_summary', 'status', 'total_amount', and 'order_id'
$query = "SELECT 
            tbl_orders.order_id, 
            tbl_orders.products_summary, 
            tbl_orders.status, 
            tbl_orders.total_amount, 
            tbl_user.name
          FROM 
            `tbl_orders` 
          INNER JOIN 
            tbl_user 
          ON 
            tbl_orders.user_id = tbl_user.user_id 
          ORDER BY 
            tbl_orders.order_id DESC;
";
$result = mysqli_query($con, $query);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="card mb-4 mt-5">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    Order List
                    <span class="badge bg-secondary">Total Orders: <?php echo mysqli_num_rows($result); ?></span>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Order Data
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Products Summary</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Products Summary</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // 1. Set Status Badge
                                    if ($row['status'] == 1) {
                                        $statusText = '<span class="badge bg-success">Completed</span>';
                                    } elseif ($row['status'] == 2) {
                                        $statusText = '<span class="badge bg-warning text-dark">Pending</span>';
                                    } else {
                                        $statusText = '<span class="badge bg-danger">Cancelled</span>';
                                    }

                                    echo "<tr>";
                                    // Customer Name
                                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                    
                                    // Products Summary (Use a tooltip for long summary)
                                    echo "<td title='" . htmlspecialchars($row['products_summary']) . "'>" . 
                                         substr(htmlspecialchars($row['products_summary']), 0, 40) . (strlen($row['products_summary']) > 40 ? '...' : '') . 
                                         "</td>";
                                    
                                    // Total Amount (Formatted)
                                    // Assuming 'total_amount' is a column in tbl_orders
                                    echo "<td>PKR" . number_format($row['total_amount'] ?? 0, 2) . "</td>";
                                    
                                    // Status
                                   // Assuming the status column is <td>...</td>
echo "<td>"; 


echo '<form  method="POST" class="d-flex">';


echo '<input type="hidden" name="order_id" value="' . htmlspecialchars($row['order_id']) . '">';


echo '<select name="new_status" class="form-select form-select-sm me-2">';


$selected = ($row['status'] == 1) ? 'selected' : '';
echo '<option value="1" ' . $selected . '>Completed</option>';


$selected = ($row['status'] == 2) ? 'selected' : '';
echo '<option value="2" ' . $selected . '>in processing</option>';


$selected = ($row['status'] != 1 && $row['status'] != 2) ? 'selected' : '';
echo '<option value="0" ' . $selected . '>pending</option>';

echo '</select>';


echo '<button type="submit" name="statusBtn" class="btn btn-sm btn-primary" title="Update Status">Update</button>';

echo '</form>';
// --- END Status Update Form ---

echo "</td>";
                                    
                                    // Action
                                    echo '<td>';
                                    echo '<a href="view_order.php?id=' . $row['order_id'] . '" class="btn btn-sm btn-info me-2" title="View Details"><i class="fas fa-eye"></i></a>';
                                    echo '<a href="delete_order.php?id=' . $row['order_id'] . '" class="btn btn-sm btn-danger" title="Delete Order"><i class="fas fa-trash"></i></a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo '<tr><td colspan="5" class="text-center p-4">No orders found.</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
<?php 

include("footer.php");
if(isset($_POST['statusBtn'])){
    $orderId=$_POST['order_id'];
    $newStatus=$_POST['new_status'];
    $updateStatus="UPDATE `tbl_orders` SET `status`='$newStatus' WHERE `order_id`='$orderId'";
    $result=mysqli_query($con,$updateStatus);
    if($result){
        echo "<script>
        window.location.href = 'order_details.php';
    </script>";
    }
}
?>