<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Luxury Car Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

 <!-- Navbar -->
<nav class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="text-white text-2xl font-bold flex items-center">
                    <img src="{{ asset('images/Logo.jpg') }}" alt="Logo" class="mr-3 h-10 rounded">
                    LuxuryCarHub
                </a>
                <div class="ml-10 flex space-x-4 hidden md:flex">
                    <a href="/vehicles" class="text-gray-300 hover:text-white">Vehicles</a>
                    <a href="#dealers" class="text-gray-300 hover:text-white">Dealers</a>
                    <a href="/map" class="text-gray-300 hover:text-white">Maps</a>
                    <a href="/about" class="text-gray-300 hover:text-white">About Us</a>
                    <a href="/contact" class="text-gray-300 hover:text-white">Contact Us</a>
                </div>
            </div>            <div class="flex items-center space-x-4">
                <div class="hidden md:flex space-x-4">
                    <a href="/login" class="text-gray-300 hover:text-white px-4 py-2">Login</a>
                    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Register</a>
                </div>
                <div class="md:hidden">
                    <button id="menu-toggle" class="text-gray-300 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden">
            <ul class="space-y-4 text-white">
                <li><a href="/vehicles" class="block text-gray-300 hover:text-white">Vehicles</a></li>
                <li><a href="#dealers" class="block text-gray-300 hover:text-white">Dealers</a></li>
                <li><a href="/map" class="block text-gray-300 hover:text-white">Maps</a></li>                <li><a href="/about" class="block text-gray-300 hover:text-white">About Us</a></li>
                <li><a href="/contact" class="block text-gray-300 hover:text-white">Contact Us</a></li>
                <li><a href="/login" class="block text-gray-300 hover:text-white">Login</a></li>
                <li><a href="/register" class="block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 mt-2">Register</a></li>
            </ul>
        </div>
    </div>
</nav>

<script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>


    <!-- Content -->
    <div class="container mx-auto px-4 py-10">
       <h1 class="text-4xl font-bold text-gray-800 mb-6">Contact Us</h1>
       <form action="contactUs.php" method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
          <div class="mb-4">
             <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
             <input type="text" id="name" name="name" class="border-gray-300 rounded-lg px-4 py-2 w-full" placeholder="Your Name" required>
          </div>
          <div class="mb-4">
             <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
             <input type="email" id="email" name="email" class="border-gray-300 rounded-lg px-4 py-2 w-full" placeholder="Your Email" required>
          </div>
          <div class="mb-4">
             <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
             <textarea id="message" name="message" rows="4" class="border-gray-300 rounded-lg px-4 py-2 w-full" placeholder="Your Message" required></textarea>
          </div>
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
             Submit
          </button>
       </form>
    </div>



 <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-6">
        <p>&copy; 2025 LuxuryCarHub. All Rights Reserved.</p>
        <p class="text-sm">LuxuryCarHub.com | Contact: support@luxurycarhub.com</p>
    </footer>

</body>
</html>