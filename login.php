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
        window.location.href = 'home.php';
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS from CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Toast notification styles */
        .hidden { display: none; }
        .visible { display: block; }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Login Form Container -->
    <div class="max-w-md mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

        <form method="post" action="">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" required>

            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" required>

            <input type="submit" value="Login" class="w-full bg-blue-500 text-white py-2 rounded">
        </form>

        <!-- Sign-up Link -->
        <p class="text-center text-gray-600 mt-6">
            Don't have an account? 
            <a href="index.php" class="text-blue-500 hover:underline">Sign up</a>
        </p>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-5 right-5 hidden p-4 rounded-lg text-white">
        <p id="toastMessage"></p>
    </div>

    <!-- JavaScript and Toast Logic -->
    <script>
        // PHP to JavaScript: Pass session data (message and type)
        var message = "<?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?>";
        var messageType = "<?php echo isset($_SESSION['msg_type']) ? $_SESSION['msg_type'] : ''; ?>";

        <?php
        // Clear the session message after displaying it
        unset($_SESSION['message']);
        unset($_SESSION['msg_type']);
        ?>

        // Function to show toast
        function showToast(message, type) {
            var toast = document.getElementById('toast');
            var toastMessage = document.getElementById('toastMessage');
            toastMessage.textContent = message;

            // Set background color based on message type
            if (type === 'success') {
                toast.classList.add('bg-green-500');
            } else if (type === 'error') {
                toast.classList.add('bg-red-500');
            }

            // Show toast
            toast.classList.remove('hidden');
            toast.classList.add('visible');

            // Hide toast after 3 seconds
            setTimeout(function () {
                toast.classList.remove('visible');
                toast.classList.add('hidden');
            }, 3000);
        }

        // Display the toast if there's a message
        if (message) {
            showToast(message, messageType);
        }
    </script>
</body>
</html>
