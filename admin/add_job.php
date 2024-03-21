<?php
include ('../connection.php');

$stmt = $conn->prepare("INSERT INTO jobslist (title, location, role, period, description, lpa) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssd", $title, $location, $role, $period, $description, $lpa);

$title = $_POST['Title'];
$location = $_POST['Location'];
$role = $_POST['Role'];
$lpa = $_POST['LPA'];
$period = $_POST['gridRadios'];
$description = $_POST['Description'];

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: jobs.php");
} else {
    echo "Error: " . $stmt->error;
}

?>