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

// Check if the user is logged in
if (!isset($_SESSION['user_id'])  || $_SESSION['role_id'] !== 2) {
    header('Location: ../../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #002d72, #004b87);
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-900 via-blue-800 to-blue-700 text-white">
    <div class="bg-gray-900 p-10 rounded-xl shadow-xl max-w-md w-full">
        <h1 class="text-4xl font-bold text-center mb-6">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p class="text-center text-gray-400 mb-8">This is your dashboard. Manage your account and settings here.</p>

        <div class="space-y-4">
            <a href="./profile.php" class="block w-full py-3 bg-blue-600 text-white font-semibold rounded-lg text-center hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-300">View Profile</a>
            <a href="./settings.php" class="block w-full py-3 bg-blue-500 text-white font-semibold rounded-lg text-center hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">Account Settings</a>
            <a href="./src/auth/logout.php" class="block w-full py-3 bg-red-600 text-white font-semibold rounded-lg text-center hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 transition duration-300">Logout</a>
        </div>
    </div>
</body>
</html>


