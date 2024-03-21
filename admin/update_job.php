<?php
// update_job.php

// Include your database connection file
include ('../connection.php');

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required POST parameters are set
    if (isset ($_POST['id']) && isset ($_POST['field']) && isset ($_POST['value'])) {
        // Sanitize the input data
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $field = mysqli_real_escape_string($conn, $_POST['field']);
        $value = mysqli_real_escape_string($conn, $_POST['value']);

        // Update the database based on the field
        $sql = "UPDATE jobslist SET $field = '$value' WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            // If the query is successful, send back a success message
            echo "success";
        } else {
            // If the query fails, send back an error message
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // If any required parameter is missing, send back an error message
        echo "Missing parameters";
    }
} else {
    // If the request method is not POST, send back an error message
    echo "Invalid request method";
}

// Close the database connection
$conn->close();
?>