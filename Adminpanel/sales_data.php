<?php
include("header.php");

$query = "
    SELECT tbl_user.name, SUM(tbl_orders.total_amount) AS total
    FROM tbl_orders
    INNER JOIN tbl_user ON tbl_orders.user_id = tbl_user.user_id
    GROUP BY tbl_user.user_id
";

$result = mysqli_query($con, $query);

$names = [];
$totals = [];

while ($row = mysqli_fetch_assoc($result)) {
    $names[] = $row['name'];
    $totals[] = (float)$row['total'];
}

echo json_encode(['names' => $names, 'totals' => $totals]);
