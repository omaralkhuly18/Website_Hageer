<?php
include 'config.php';

$date = date('Y-m-d');
$sql = "SELECT * FROM entries WHERE entry_date = '$date'";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo 'no_entry';
} else {
    echo 'entry_exists';
}

$conn->close();
?>
