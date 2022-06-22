<?php

include "../db/connectdb.php";
include "../helpers/common.php";

$startDate = !empty($_POST['start_date'])
    ? date_format(date_create_from_format('d/m/Y', $_POST['start_date']), 'Y-m-d')
    : date('Y-m-01');
$endDate = !empty($_POST['end_date'])
    ? date_format(date_create_from_format('d/m/Y', $_POST['end_date']), 'Y-m-d')
    : date('Y-m-t');

$sql = "SELECT order_amount, createdAt FROM orders WHERE DATE(createdAt) BETWEEN '$startDate' AND '$endDate' ORDER BY createdAt ASC";

$query = mysqli_query($con, $sql);
$row = mysqli_fetch_all($query);

$dateDiff = date_diff(date_create($startDate), date_create($endDate))->days;

$result = [];

for ($i = 0; $i <= $dateDiff; $i++) {
    $date = date('Y-m-d', strtotime("+$i day", strtotime($startDate)));
    $amountByDay = array_filter($row, fn($item) => date('Y-m-d', strtotime($item[1])) === $date);

    $amount = array_reduce($amountByDay, function ($acc, $cur) {
        $acc += $cur[0];
        return $acc;
    },0);

    $result[$i] = compact('amount', 'date');
}

echo json_encode($result);