<?php
include 'config.php';

$start_of_week = date('Y-m-d', strtotime('last Monday'));
$end_of_week = date('Y-m-d', strtotime('next Sunday'));

$sql = "SELECT SUM(value) AS weekly_total FROM entries WHERE entry_date BETWEEN '$start_of_week' AND '$end_of_week'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Total for this week: " . $row['weekly_total'];
} else {
    echo "No entries found for this week.";
}

$conn->close();
?>
