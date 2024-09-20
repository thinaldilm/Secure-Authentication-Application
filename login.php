<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure PHP Authentication | Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        };
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #0D1B2A, #1B263B);
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 bg-gradient-to-r from-dark-blue to-darker-blue text-white">
    <form action="./src/auth/login.php" method="POST" class="bg-gray-800 p-8 rounded-2xl shadow-2xl w-full max-w-md space-y-6 text-gray-200">
        <h1 class="text-3xl font-bold text-center text-gray-100 mb-6">Login to Your Account</h1>

        <!-- Error Message -->
        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-600 text-white p-3 rounded-lg mb-4">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        
        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email:</label>
            <input type="email" id="email" name="email" required 
                   class="w-full px-4 py-3 bg-gray-700 text-gray-100 border border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-300 placeholder-gray-400" placeholder="Enter your email">
        </div>

        <!-- Password Input -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Password:</label>
            <input type="password" id="password" name="password" required 
                   class="w-full px-4 py-3 bg-gray-700 text-gray-100 border border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition duration-300 placeholder-gray-400" placeholder="Enter your password">
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-teal-500 bg-gray-700 border-gray-600 rounded focus:ring-teal-500">
                <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
            </div>
            <a href="#" class="text-sm text-teal-400 hover:text-teal-500">Forgot password?</a>
        </div>

        <!-- Submit Button -->
        <div>
            <input type="submit" value="Login" 
                   class="w-full px-4 py-3 bg-teal-600 text-white font-semibold rounded-lg hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 transition duration-300">
        </div>

        <!-- Register Link -->
        <div class="text-center mt-4">
            <p class="text-sm text-gray-400">Don't have an account? <a href="./register.php" class="text-teal-400 hover:text-teal-500">Sign up</a></p>
        </div>
    </form>
</body>
</html>
