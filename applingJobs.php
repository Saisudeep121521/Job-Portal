<?php
session_start();

if (!isset ($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include ('connection.php');

$userId = $_SESSION['username'];
$jobId = $_POST['job_id'];
$currentDate = date("Y-m-d H:i:s");

$sql = "INSERT INTO applied_jobs (username, jobId, date) VALUES ('$userId', $jobId, '$currentDate')";

if ($conn->query($sql) === TRUE) {
    header("Location: main.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>