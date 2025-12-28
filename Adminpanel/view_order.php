<?php
session_start();
// Include the database connection (assumes $con is available)
include("../connection/connection.php");
include("header.php"); // Include your header file (for navigation/layout start)

// 1. Input Validation and Security
if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    // Redirect or show error if ID is missing or invalid
    echo '<div class="alert alert-danger mt-3">❌ Error: Invalid or missing Order ID.</div>';
    include("footer.php");
    exit;
}

$order_id = (int)$_GET["id"];

// 2. Database Query using Prepared Statements for Security
$query = "
    SELECT 
        u.name AS user_name,
        u.email AS user_email,
        o.order_id,
        o.total_amount,
        o.products_summary,
        o.order_date,
        o.status
    FROM 
        tbl_orders o
    INNER JOIN 
        tbl_user u ON o.user_id = u.user_id
    WHERE 
        o.order_id = ?
    LIMIT 1;
";

$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, 'i', $order_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$order_data = mysqli_fetch_assoc($result);

// 3. Check if Order Exists
if (!$order_data) {
    echo '<div class="alert alert-warning mt-3">⚠️ Order with ID ' . htmlspecialchars($order_id) . ' not found.</div>';
    include("footer.php");
    exit;
}

// Format the status for display
if ($order_data['status'] == 1) {
    $statusText = '<span class="badge bg-success">Completed</span>';
} elseif ($order_data['status'] == 2) {
    $statusText = '<span class="badge bg-warning text-dark">Pending</span>';
} else {
    $statusText = '<span class="badge bg-danger">Cancelled</span>';
}

// 4. Close the statement
mysqli_stmt_close($stmt);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Order Details (ID: <?php echo htmlspecialchars($order_data['order_id']); ?>)</h1>


            
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-user-circle me-2"></i>Customer Information
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> <?php echo htmlspecialchars($order_data['user_name']); ?></p>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($order_data['user_email']); ?></p>
                            <p><strong>Order Date:</strong> <?php echo date('F j, Y, g:i a', strtotime($order_data['order_date'])); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 mb-4">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="card-header bg-success text-white">
                            <i class="fas fa-shopping-cart me-2"></i>Order Summary
                        </div>
                        <div class="card-body">
                            <p class="fs-4 text-dark">
                                <strong>Total Amount:</strong> 
                                <span class="badge bg-success fs-5">₹<?php echo number_format($order_data['total_amount'] ?? 0, 2); ?></span>
                            </p>
                            <p><strong>Order Status:</strong> <?php echo $statusText; ?></p>
                            <hr>
                            <h5>Products Ordered:</h5>
                            <p class="text-muted"><?php echo nl2br(htmlspecialchars($order_data['products_summary'])); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <a href="order_details.php" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Back to Orders</a>
              
            </div>

        </div>
    </main>
<?php include("footer.php"); // Include your footer file ?>