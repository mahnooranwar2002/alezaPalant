<?php

include('Navbar.php'); 
$userRecord = $_SESSION["userLogined"] ?? null;


if (!isset($userRecord)) {
 
    header("Location: ../Auth/login.php");
    exit;
}


$userId = (int)$userRecord;


$selectQuery = "SELECT * FROM `tbl_orders` WHERE user_id = ?";


$stmt = mysqli_prepare($con, $selectQuery);


mysqli_stmt_bind_param($stmt, 'i', $userId);

mysqli_stmt_execute($stmt);

// Get the result set
$result = mysqli_stmt_get_result($stmt);

?>


<div class="breadcrumb-area">
        <!-- Top Breadcrumb Area -->
        <div class="top-breadcrumb-area bg-img bg-overlay d-flex align-items-center justify-content-center" style="background-image: url(img/bg-img/24.jpg);">
            <h2>MY orders</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Page</a></li>
                            <li class="breadcrumb-item active" aria-current="page">MY orders</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
    <h1>My Order History</h1>

    <?php if ($result && mysqli_num_rows($result) > 0) : ?>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) : 
                // Determine Status text and color based on the 'status' column
                if ($row['status'] == 1) {
                    $statusClass = 'bg-success';
                    $statusText = 'Completed';
                } elseif ($row['status'] == 2) {
                    $statusClass = 'bg-warning text-dark';
                    $statusText = 'Pending';
                } else {
                    $statusClass = 'bg-danger';
                    $statusText = 'Cancelled';
                }
            ?>
                <div class="col-lg-6 col-md-12 mb-4">
                    <div class="card shadow-sm h-100 border-start border-5 border-<?php echo ($row['status'] == 1) ? 'success' : (($row['status'] == 2) ? 'warning' : 'danger'); ?>">
                        
                        <div class="card-header d-flex justify-content-between align-items-center bg-light">
                            <h5 class="mb-0 text-primary">Order #<?php echo htmlspecialchars($row['order_id']); ?></h5>
                            <small class="text-muted">Placed on: <?php echo date('M j, Y', strtotime($row['order_date'])); ?></small>
                        </div>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="mb-0"><strong>Status:</strong> <span class="badge <?php echo $statusClass; ?> fs-6"><?php echo $statusText; ?></span></p>
                                <p class="mb-0 fs-5"><strong>Total:</strong> <span class="text-success">pkr<?php echo number_format($row['total_amount'] ?? 0, 2); ?></span></p>
                            </div>
                            
                            <h6 class="card-subtitle mb-2 text-muted">Items Summary:</h6>
                            <p class="card-text small text-truncate" title="<?php echo htmlspecialchars($row['products_summary']); ?>">
                                <?php echo substr(htmlspecialchars($row['products_summary']), 0, 100) . (strlen($row['products_summary']) > 100 ? '...' : ''); ?>
                            </p>
                        </div>
                        
                     
                    </div>
                </div>
                <?php endwhile; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info mt-3" role="alert">
            <i class="fas fa-box-open me-2"></i> You haven't placed any orders yet. Start shopping now!
        </div>
    <?php endif; ?>
</div>

<?php 
// Close the statement and connection
include('Footer.php');
// include('Footer.php'); // Include your footer if you have one
?>

