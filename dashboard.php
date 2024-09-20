<?php
session_start();

// Set the session timeout duration (10 minutes)
$session_timeout = 10 * 60; // 10 minutes in seconds

// Check if the session has expired
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $session_timeout) {
    // Logging the logout action before destroying session
    require_once '../db/connection.php';
    $pdo = getDBConnection();
    $stmt = $pdo->prepare('INSERT INTO user_logs (user_id, action) VALUES (?, ?)');
    $stmt->execute([$_SESSION['user_id'], 'Logout due to inactivity']);

    // Session expired, destroy it and redirect to login page
    session_unset();
    session_destroy();
    header('Location: ../../login.php?error=Session%20expired%20due%20to%20inactivity');
    exit();
}

// Update last activity time
$_SESSION['last_activity'] = time();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] !== 1) {
    header('Location: ../../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #0f172a, #1e293b);
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-700 text-white">
    <div class="bg-gray-800 p-8 rounded-xl shadow-xl max-w-md w-full">
        <h1 class="text-4xl font-bold text-center mb-6">Admin Panel</h1>
        <p class="text-center text-gray-400 mb-8">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! Manage the application settings and user accounts here.</p>

        <div class="space-y-4">
            <a href="./manage_users.php" class="block w-full py-3 bg-teal-600 text-white font-semibold rounded-lg text-center hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-300">Manage Users</a>
            <a href="./site_settings.php" class="block w-full py-3 bg-indigo-600 text-white font-semibold rounded-lg text-center hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300">Site Settings</a>
            <a href="./view_logs.php" class="block w-full py-3 bg-yellow-600 text-white font-semibold rounded-lg text-center hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-300">View Logs</a>
            <a href="./src/auth/logout.php" class="block w-full py-3 bg-red-600 text-white font-semibold rounded-lg text-center hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300">Logout</a>
        </div>
    </div>
</body>
</html>

