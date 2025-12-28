<?php
session_start();
include("../connection/connection.php");

// Get the logged-in user ID
$userId = $_SESSION["userLogined"] ?? null;

// Basic validation: Ensure the user is logged in
if (!$userId) {
    // Set an error message and redirect if the user is not logged in
    $_SESSION['error_message'] = "Please log in to place an order.";
    header("Location: login.php"); // Redirect to your login page
    exit;
}

// 1. Start a database transaction for atomicity
mysqli_begin_transaction($con);

try {
    // --- Step 1: SELECT - Fetch cart items ---
    $select_sql = "SELECT p_name, qunatity, price FROM tbl_cart WHERE user_id = ?";
    $stmt_select = mysqli_prepare($con, $select_sql);
    mysqli_stmt_bind_param($stmt_select, 'i', $userId);
    mysqli_stmt_execute($stmt_select);
    $outcome = mysqli_stmt_get_result($stmt_select);
    
    if (mysqli_num_rows($outcome) == 0) {
        throw new Exception("Cart is empty. No order was placed.");
    }

    $total_price = 0;
    $product_details = [];

    // Calculate total price and build a product summary list
    while ($item = mysqli_fetch_assoc($outcome)) {
        $subtotal = $item['price'] * $item['qunatity'];
        $total_price += $subtotal;
        $product_details[] = htmlspecialchars($item['p_name']) . 
                             ' (Qty: ' . htmlspecialchars($item['qunatity']) . ')' . 
                             ' (Price: ' . htmlspecialchars($item['price']) . ')';
    }
    
    $products_list = implode(', ', $product_details);
    $order_date = date('Y-m-d H:i:s');
    // Set the initial status to 2 (Pending/Processing) rather than 0 (Cancelled/Deactive)
    $initial_status = 2; 
    
    // --- Step 2: INSERT - Insert the order summary into the orders table ---
    $insert_sql = "INSERT INTO tbl_orders (user_id, total_amount, products_summary, order_date, `status`) VALUES (?, ?, ?, ?, ?)";
    $stmt_insert = mysqli_prepare($con, $insert_sql);

    // Bind parameters: 'i' int, 'd' double, 's' string, 's' string, 'i' int
    mysqli_stmt_bind_param($stmt_insert, 'idssi', $userId, $total_price, $products_list, $order_date, $initial_status);
    
    if (!mysqli_stmt_execute($stmt_insert)) {
        throw new Exception("Failed to insert order into tbl_orders: " . mysqli_error($con));
    }

    // --- Step 3: DELETE - Clear the user's cart ---
    $delete_sql = "DELETE FROM tbl_cart WHERE user_id = ?";
    $stmt_delete = mysqli_prepare($con, $delete_sql);
    mysqli_stmt_bind_param($stmt_delete, 'i', $userId);
    
    if (!mysqli_stmt_execute($stmt_delete)) {
        throw new Exception("Failed to clear items from tbl_cart.");
    }

    // --- Success: Commit the transaction ---
    mysqli_commit($con);
    
    // Set success message in session
    $_SESSION['success_message'] = "✅ Order placed successfully! Thank you for your purchase.";
    
    // Use PHP header redirect (preferred over JavaScript)
    header("Location: index.php"); 
    exit;

} catch (Exception $e) {
    // --- Failure: Rollback the transaction ---
    mysqli_rollback($con);
    
    // Set error message in session
    $_SESSION['error_message'] = "❌ Order Failed! " . $e->getMessage();
    
    // Use PHP header redirect to send the user back to the cart or index page
    header("Location: index.php"); // Or wherever you want the user to go on failure
    exit;
    
} finally {
    // Close the connection
    if (isset($con)) {
        mysqli_close($con); 
    }
}
?>