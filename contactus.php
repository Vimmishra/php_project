<?php
// Start the session
session_start();

// Include database configuration
include('config.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $query = $_POST['query'];

    // Prepare the SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO contact_queries (email, query) VALUES (?, ?)");
    $stmt->bind_param('ss', $email, $query);

    // Execute the statement and check if the query was successful
    if ($stmt->execute()) {
        $_SESSION['message'] = "Your query has been submitted successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "There was an error submitting your query. Please try again.";
        $_SESSION['msg_type'] = "error";
    }

    $stmt->close();
}

?>

