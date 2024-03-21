<?php
include ('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST["id"])) {
    $id = $_POST["id"];

    $sql = "DELETE FROM `jobslist` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "error";
}
?>