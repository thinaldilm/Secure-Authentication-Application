<?php
session_start(); // Start the session to track user login status

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure PHP Authentication</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      // Include Tailwind's dark mode support if needed
      tailwind.config = {
        darkMode: 'class',
      };
    </script>
</head>
<body class="min-h-screen bg-gradient-to-b from-[#141E30] to-[#243B55] text-white flex items-center justify-center p-6">
    <div class="w-full max-w-lg p-8 bg-gray-900 bg-opacity-80 rounded-xl shadow-lg backdrop-blur-lg border border-gray-700 space-y-6">
        <!-- Header with Title -->
        <div class="flex items-center justify-center mb-4">
            <svg class="w-10 h-10 text-yellow-400 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2L2 12h3v8h8v-8h3L12 2z"></path>
            </svg>
            <h1 class="text-4xl font-bold text-center text-yellow-400">Secure Auth</h1>
        </div>

        <?php if ($isLoggedIn): ?>
            <!-- Content for logged-in users -->
            <p class="text-lg text-center mb-4">Welcome, <span class="font-semibold text-yellow-300"><?php echo htmlspecialchars($_SESSION['username']); ?></span>!</p>
            <div class="flex justify-center space-x-4">
                <a href="./src/auth/logout.php" class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg shadow-lg hover:shadow-red-700 transition transform hover:scale-105">Logout</a>
                <?php if ($_SESSION['role_id'] == 1): ?>
                    <a href="./dashboard.php" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-lg hover:shadow-blue-700 transition transform hover:scale-105">Admin Dashboard</a>
                <?php else: ?>
                    <a href="./my_dashboard.php" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-lg hover:shadow-blue-700 transition transform hover:scale-105">User Dashboard</a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <!-- Content for guests -->
            <p class="text-center text-gray-300 mb-6">Log in or register to continue.</p>
            <div class="flex flex-col space-y-4">
                <a href="./login.php" class="px-5 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg text-center shadow-lg hover:shadow-green-700 transition transform hover:scale-105">Login</a>
                <a href="./register.php" class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-center shadow-lg hover:shadow-blue-700 transition transform hover:scale-105">Register</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
