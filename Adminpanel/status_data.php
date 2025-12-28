<?php
include("header.php");

$query = "SELECT status, COUNT(*) AS count FROM tbl_orders GROUP BY status";
$result = mysqli_query($con, $query);

$data = [
    'completed' => 0,
    'processing' => 0,
    'pending' => 0
];

while ($row = mysqli_fetch_assoc($result)) {
    switch ($row['status']) {
        case 1:
            $data['completed'] = (int)$row['count'];
            break;
        case 2:
            $data['processing'] = (int)$row['count'];
            break;
        default:
            $data['pending'] = (int)$row['count'];
    }
}

echo json_encode($data);
