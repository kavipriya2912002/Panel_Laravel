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
            <h1 class="text-2xl font-bold">BBPS Panel</h1>
        </div>
        <!-- Left-Aligned Content (Empty or Add if needed) -->
        <div class="flex-grow"></div>

        <!-- Center-Aligned Heading -->
        

        <!-- Right-Aligned Content -->
        <div class="ml-auto flex items-center space-x-6">
            <div class="bg-gray-50 p-2 shadow rounded-lg text-center">
                <span class="text-gray-600 text-sm">Wallet Balance</span>
                <p id="wallet-amount" class="font-semibold text-lg">₹ 0.2</p>
            </div>
        </div>
    </div>
</header>




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
    </div>
    
    </div>
  </div>

  <script>
    
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