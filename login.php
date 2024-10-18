<?php
session_start();
include('config.php'); // Include the database connection file

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user credentials
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['message'] = "Login successful!";
            $_SESSION['msg_type'] = "success";
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

       

            // Redirect after 3 seconds to homepage
         
       echo "<script>
    setTimeout(function() {
        window.location.href = 'home.html';
    }, 2000);
        </script>";

        } else {
            $_SESSION['message'] = "Invalid credentials. Please try again.";
            $_SESSION['msg_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "No user found with this email.";
        $_SESSION['msg_type'] = "error";
    }
    $stmt->close();
}
?>

