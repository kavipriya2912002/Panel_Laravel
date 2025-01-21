<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Bill Payments Template</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-gray-100">
  <!-- Header Section -->
  <header class="bg-white shadow">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <div class="text-center flex-grow">
            <a href="{{ route('home') }}" class="text-2xl font-bold">
                BBPS Panel
            </a>
        </div>
        
        <!-- Left-Aligned Content (Empty or Add if needed) -->
        <div class="flex-grow"></div>

        <!-- Right-Aligned Content -->
        <div class="ml-auto flex items-center space-x-6">
            <div class="bg-gray-50 p-2 shadow rounded-lg text-center">
                <span class="text-gray-600 text-sm">Wallet Balance</span>
                <p id="wallet-amount" class="font-semibold text-lg">₹ 0.2</p>
            </div>
            <!-- Logout Button -->
            <button id="logout-button" class=" text-black font-bold px-4 py-2 rounded-lg">
                Logout
            </button>
        </div>
    </div>
</header>

<!-- Logout Confirmation Modal -->
<div id="logout-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-1/3">
        <h3 class="text-xl font-semibold">Are you sure you want to logout?</h3>
        <div class="mt-4 flex justify-between">
            <button id="logout-cancel" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg">
                Cancel
            </button>
            <button id="logout-confirm" class="bg-red-500 text-white px-4 py-2 rounded-lg">
                Logout Now
            </button>
        </div>
    </div>
</div>



  <!-- Bill Payments Section -->
  <div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-white text-lg font-bold mb-6 bg-blue-600 border border-blue-700 rounded-md p-3 shadow-md">
        Bill Payments
    </h2>

    <div class="grid grid-cols-4 gap-6">
        <a href="{{ route('wallet') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="{{ asset('assets/transfers.svg') }}" alt="wallet" class="h-9 mb-3">
            <p class="text-L font-medium">Wallet</p>
        </a>
        <!-- Electricity -->
        <a href="{{ route('electricity') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="{{ asset('assets/lightbulb.png') }}" alt="Electricity" class="h-10 mb-3">
            <p class="text-L font-medium">Electricity</p>
        </a>
        <!-- Mobile Recharge -->
        <a href="{{ route('mobile') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="{{ asset('assets/mobile.png') }}" alt="Mobile Recharge" class="h-10 mb-3">
            <p class="text-L font-medium">Mobile Recharge</p>
        </a>
        <!-- Gas Bill -->
        <a href="{{ route('gas') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="{{ asset('assets/gas.png') }}" alt="Gas Bill" class="h-10 mb-3">
            <p class="text-L font-medium">Gas Bill</p>
        </a>
        <!-- Broadband -->
        {{-- <a href="{{ route('broadband') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="/storage/router.png" alt="Broadband/Landline" class="h-10 mb-3">
            <p class="text-L font-medium">Broadband/Landline</p>
        </a>
        <!-- Pay Loan -->
        <a href="{{ route('loan') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="/storage/loan.png" alt="Pay Loan" class="h-10 mb-3">
            <p class="text-L font-medium">Pay Loan</p>
        </a> --}}
        <!-- Recharge DTH or TV -->
        <a href="{{ route('dth') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="{{ asset('assets/router.png') }}" alt="Recharge DTH or TV" class="h-10 mb-3">
            <p class="text-L font-medium">Recharge DTH or TV</p>
        </a>
        <a href="{{ route('fetch') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="{{ asset('assets/satellite-dish.png') }}" alt="Recharge DTH or TV" class="h-10 mb-3">
            <p class="text-L font-medium">Fetch </p>
        </a>

        <a href="{{ route('transfer') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
            <img src="{{ asset('assets/transfers.svg') }}" alt="wallet" class="h-9 mb-3">
            <p class="text-L font-medium">Transactions</p>
        </a>
    </div>
    
    </div>
  </div>

  <script>


// Show the logout confirmation modal
document.getElementById('logout-button').addEventListener('click', () => {
        document.getElementById('logout-modal').classList.remove('hidden');
    });

    // Close the logout confirmation modal
    document.getElementById('logout-cancel').addEventListener('click', () => {
        document.getElementById('logout-modal').classList.add('hidden');
    });

    // Call the logout route when the user confirms
    document.getElementById('logout-confirm').addEventListener('click', () => {
        axios.post('/logout')
            .then(response => {
                // Handle successful logout, like redirecting to the login page
                window.location.href = '/login'; // Replace with your login page URL
            })
            .catch(error => {
                console.error('Logout failed:', error);
                alert('Logout failed. Please try again.');
            });
    });




    
    function fetchWalletAmount() {
    axios.get('/get-wallet-amount')
        .then(response => {
            // Log the response to verify the structure
            console.log('Response:', response.data);

            // Access the balance directly
            if (response.status === 200 && response.data.balance !== undefined) {
                const walletAmountElement = document.getElementById('wallet-amount');
                walletAmountElement.textContent = `₹ ${response.data.balance}`;
            } else {
                console.error('Failed to fetch wallet amount: Balance not found');
            }
        })
        .catch(error => {
            console.error('Error fetching wallet amount:', error);
        });
}

// Fetch wallet amount on page load
document.addEventListener('DOMContentLoaded', fetchWalletAmount);
  </script>
</body>
</html>