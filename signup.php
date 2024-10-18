<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the username or email already exists
    $checkUser = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $checkUser->bind_param("ss", $username, $email);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($result->num_rows > 0) {
        // User already exists, store message in session
        $_SESSION['message'] = "Username or email already exists. Please choose a different one.";
        $_SESSION['msg_type'] = "error";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the insert statement
        $insertUser = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $insertUser->bind_param("sss", $username, $email, $hashed_password);

        // Execute the insert query
        if ($insertUser->execute()) {
            $_SESSION['message'] = "Signup successful! You can now login.";
            $_SESSION['msg_type'] = "success";
            header("Location: login.html");
            exit();

        } else {
            $_SESSION['message'] = "Error: " . $insertUser->error;
            $_SESSION['msg_type'] = "error";
        }

        // Close the statement
        $insertUser->close();
    }

    // Close the checkUser statement
    $checkUser->close();
    
    // Redirect back to the signup page after processing
    header("Location: index.html");
    exit();
}

$conn->close();
?>
