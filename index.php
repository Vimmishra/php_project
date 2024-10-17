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
            header("Location: login.php");
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <!-- Tailwind CSS CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Signup</h2>

        <form method="post" action="">
            <label class="block text-gray-700">Username</label>
            <input type="text" name="username" class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" required>

            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" required>

            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" required>

            <input type="submit" value="Signup" class=" cursor-pointer w-full bg-blue-500 text-white py-2 rounded">
        </form>

        <!-- Sign-in Link -->
        <p class="text-center text-gray-600 mt-6">
            Already have an account? 
            <a href="login.php" class="text-blue-500 hover:underline">Sign in</a>
        </p>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-5 right-5 hidden p-4 rounded-lg text-white">
        <p id="toastMessage"></p>
    </div>

    <script>
        // Toast function to show message
        function showToast(message, type) {
            var toast = document.getElementById('toast');
            var toastMessage = document.getElementById('toastMessage');
            toastMessage.textContent = message;

            // Add color based on the type of message
            if (type === 'success') {
                toast.classList.add('bg-green-500');
            } else if (type === 'error') {
                toast.classList.add('bg-red-500');
            }

            // Show toast
            toast.classList.remove('hidden');

            // Hide after 3 seconds
            setTimeout(function () {
                toast.classList.add('hidden');
            }, 3000);
        }

        // Check if there's a message from the PHP session
        <?php if (isset($_SESSION['message'])): ?>
        var message = "<?php echo $_SESSION['message']; ?>";
        var type = "<?php echo $_SESSION['msg_type']; ?>";

        // Call the showToast function with message and type
        showToast(message, type);

        // Clear the session message after displaying it
        <?php
        unset($_SESSION['message']);
        unset($_SESSION['msg_type']);
        ?>
        <?php endif; ?>
    </script>

</body>
</html>
