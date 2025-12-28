<?php
// CRITICAL: Start output buffering immediately. This captures all output
// from this script and any included files (like header.php).
ob_start();

include('header.php'); 

// 1. Set the content type to JSON
// We must clear the buffer before sending the header, otherwise the header fails
// because the output from header.php has already been sent.
ob_clean(); 
header('Content-Type: application/json');

// --- Start Database Operations ---

// Placeholder check for database connection
if (!isset($con) || !$con) {
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed. Check $con in header.php.']);
    // CRITICAL: Stop script execution immediately. 
    exit();
}

$sql_query = "SELECT status FROM tbl_orders";
$result = mysqli_query($con, $sql_query);
$data = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row; 
    }
} else {
    // Handle SQL error
    http_response_code(500);
    $error_message = mysqli_error($con);
    echo json_encode(['error' => 'SQL Query Failed: ' . $error_message]);
    // CRITICAL: Stop script execution immediately. 
    exit();
}

// 2. Output the final JSON data

// **FINAL FAIL-SAFE**: Clear the buffer one last time. If anything (like print_r) 
// ran after the previous ob_clean(), it gets cleared here.
if (ob_get_length() > 0) {
    ob_clean();
}

echo json_encode($data);

// 3. MANDATORY: Stop script execution immediately. 
// We use ob_end_flush() here to send the final, clean JSON data.
ob_end_flush();
exit();
?>