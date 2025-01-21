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
    <div class="container mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between">
      <a href="{{ route('home') }}" class="text-2xl font-bold text-center sm:text-left">
        BBPS Panel
      </a>
      <div class="flex items-center space-x-6 mt-4 sm:mt-0">
        <div class="bg-gray-50 p-2 shadow rounded-lg text-center">
          <span class="text-gray-600 text-sm">Wallet Balance</span>
          <p id="wallet-amount" class="font-semibold text-lg">₹ 0.2</p>
        </div>
        <button id="logout-button" class="text-black font-bold px-4 py-2 rounded-lg">
          Logout
        </button>
      </div>
    </div>
  </header>

  <!-- Logout Confirmation Modal -->
  <div id="logout-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg w-11/12 sm:w-2/3 lg:w-1/3">
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
      <h2 class="text-white text-2xl font-bold mb-6 bg-black border border-blue-700 rounded-md p-3 shadow-md">
        Bill Payments
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="{{ route('wallet') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
          <img src="{{ asset('assets/transfers.svg') }}" alt="Wallet" class="h-9 mb-3">
          <p class="text-sm md:text-base font-medium">Wallet</p>
        </a>
        <a href="{{ route('electricity') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
          <img src="{{ asset('assets/lightbulb.png') }}" alt="Electricity" class="h-10 mb-3">
          <p class="text-sm md:text-base font-medium">Electricity</p>
        </a>
        <a href="{{ route('mobile') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
          <img src="{{ asset('assets/mobile.png') }}" alt="Mobile Recharge" class="h-10 mb-3">
          <p class="text-sm md:text-base font-medium">Mobile Recharge</p>
        </a>
        <a href="{{ route('gas') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
          <img src="{{ asset('assets/gas.png') }}" alt="Gas Bill" class="h-10 mb-3">
          <p class="text-sm md:text-base font-medium">Gas Bill</p>
        </a>
        <a href="{{ route('dth') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
          <img src="{{ asset('assets/router.png') }}" alt="DTH" class="h-10 mb-3">
          <p class="text-sm md:text-base font-medium">Recharge DTH or TV</p>
        </a>
        <a href="{{ route('fetch') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
          <img src="{{ asset('assets/satellite-dish.png') }}" alt="Fetch" class="h-10 mb-3">
          <p class="text-sm md:text-base font-medium">Fetch</p>
        </a>
        <a href="{{ route('transfer') }}" class="flex flex-col items-center cursor-pointer bg-gray-50 shadow-md p-4 rounded-lg">
          <img src="{{ asset('assets/transfers.svg') }}" alt="Transactions" class="h-9 mb-3">
          <p class="text-sm md:text-base font-medium">Transactions</p>
        </a>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('logout-button').addEventListener('click', () => {
      document.getElementById('logout-modal').classList.remove('hidden');
    });
    document.getElementById('logout-cancel').addEventListener('click', () => {
      document.getElementById('logout-modal').classList.add('hidden');
    });
    document.getElementById('logout-confirm').addEventListener('click', () => {
      axios.post('/logout')
        .then(() => window.location.href = '/login')
        .catch(error => alert('Logout failed. Please try again.'));
    });
    function fetchWalletAmount() {
      axios.get('/get-wallet-amount')
        .then(response => {
          if (response.data.balance !== undefined) {
            document.getElementById('wallet-amount').textContent = `₹ ${response.data.balance}`;
          }
        })
        .catch(error => console.error('Error fetching wallet amount:', error));
    }
    document.addEventListener('DOMContentLoaded', fetchWalletAmount);
  </script>
</body>
</html>
