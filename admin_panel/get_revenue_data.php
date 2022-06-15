<?php

include "../db/connectdb.php";

if (empty($_POST['unit'])) {
    header("Location: index.php?dashboard");
    return;
}

$unit = $_POST['unit'];

switch ($unit) {
    case 'month':
        $sql = "SELECT order_amount, createdAt FROM orders WHERE" . " YEAR(createdAt) = " . date('Y');
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_all($query);

        $result = [];

        for ($i = 1; $i <= 12; $i++) {
            $amountByMonth = array_filter($row, fn($item) => date('m', strtotime($item[1])) == $i);
            $result[$i] = array_reduce($amountByMonth, function ($acc, $cur) {
                $acc += $cur[0];
                return $acc;
            },0);
        }

        echo json_encode($result);
        break;

    case 'year':
        $currentYear = date('Y');

        $sql = "SELECT order_amount, createdAt FROM orders WHERE" . " YEAR(createdAt) >= " . ($currentYear - 10) . " AND YEAR(createdAt) <= $currentYear";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_all($query);

        $result = [];

        for ($i = $currentYear - 10; $i <= $currentYear; $i++) {
            $amountByYear = array_filter($row, fn($item) => date('Y', strtotime($item[1])) == $i);
            $result[$i] = array_reduce($amountByYear, function ($acc, $cur) {
                $acc += $cur[0];
                return $acc;
            },0);
        }

        echo json_encode($result);
        break;

    default:
        $sql = "SELECT order_amount, createdAt FROM orders WHERE MONTH(createdAt) = " . date('m') . " AND YEAR(createdAt) = " . date('Y');
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_all($query);

        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

        $result = [];

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $amountByDay = array_filter($row, fn($item) => date('d', strtotime($item[1])) == $i);
            $result[$i] = array_reduce($amountByDay, function ($acc, $cur) {
                $acc += $cur[0];
                return $acc;
            },0);
        }

        echo json_encode($result);
}