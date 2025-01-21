<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login and Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 to-indigo-200">
  <div class="flex flex-col lg:flex-row w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden h-auto sm:h-[80vh] md:h-[70vh] lg:h-[60vh]">
    <!-- Left Section -->
    <div class="w-full lg:w-1/2 p-6 sm:p-8 md:p-10 lg:p-12 text-white bg-blue-400">
      <div class="flex items-center mb-6">
        <img 
          src="/storage/wel_logo.jfif" 
          alt="Logo" 
          class="w-12 h-12 rounded-full border-2 border-white"
        />
        <h1 class="ml-3 text-xl sm:text-2xl font-bold">Payments</h1>
      </div>

      <h2 class="mb-6 text-3xl sm:text-4xl font-extrabold mt-8">Welcome!</h2>
      <p class="text-white text-opacity-90 mt-6 leading-relaxed text-sm sm:text-base md:text-lg">
        Welcome to Payments, where innovation meets simplicity. Whether you’re a small business, an e-commerce giant, or an individual looking for secure and efficient ways to
        send or receive payments, we’ve got you covered. Our platform integrates the latest technology to provide hassle-free solutions for all your payment needs.
      </p>
    </div>

    <!-- Right Section -->
    <div class="w-full lg:w-1/2 p-6 sm:p-8 md:p-10 flex flex-col justify-center items-center">
      <h3 class="mb-10 text-2xl sm:text-3xl font-bold text-gray-700">Get Started</h3>
      <div class="flex flex-col space-y-6 sm:space-y-8 w-full px-8 sm:px-10">
        <a
          class="w-full px-6 py-3 sm:px-8 sm:py-4 text-lg font-semibold text-white bg-blue-400 rounded-lg shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 text-center"
            href="{{ route('login') }}"
          >
          Login
        </a>
        <a
          class="w-full px-6 py-3 sm:px-8 sm:py-4 text-lg font-semibold text-blue-400 bg-white border border-blue-400 rounded-lg shadow-lg hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 text-center"
            href="{{ route('register') }}"
          >
          Register
        </a>
      </div>
    </div>
  </div>
</body>
</html>