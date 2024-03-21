<?php
session_start();

include ('../connection.php');

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $_SESSION['admin'] = $username;
    header("Location: dashboard.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}

$conn->close();
?>