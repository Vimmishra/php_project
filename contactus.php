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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Toast notification styles */
        .hidden { display: none; }
        .visible { display: block; }
    </style>
</head>
<body class="bg-gray-100">


<nav class="bg-white border-gray-200 dark:bg-gray-900 ">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="home.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://upload.wikimedia.org/wikipedia/en/1/1a/Guru_Nanak_Dev_University_Logo.png" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">GNDUC</span>
    </a>
    
   
  </div>
</nav>



    <!-- Contact Us Form Container -->
    <div class="max-w-md mx-auto mt-10 p-8 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Contact Us</h2>

        <!-- Contact Form -->
        <form method="post" action="">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" required>

            <label class="block text-gray-700">Your Query</label>
            <textarea name="query" class="w-full p-2 border border-gray-300 rounded mt-1 mb-4" rows="5" required></textarea>

            <input type="submit" value="Submit" class="cursor-pointer w-full bg-blue-500 text-white py-2 rounded">
        </form>
    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-5 right-5 hidden p-4 rounded-lg text-white">
        <p id="toastMessage"></p>
    </div>

    <!-- JavaScript to handle the toast message -->
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
