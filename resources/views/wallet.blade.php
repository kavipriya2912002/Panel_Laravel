<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


</head>

<body>
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">

            <!-- Right-Aligned Content -->
            <div class="ml-auto flex items-center space-x-6">
                {{-- <span class="text-sm font-medium">Hello</span> --}}
                <div class="bg-gray-50 p-2 shadow rounded-lg text-center">
                    <span class="text-gray-600 text-sm">Wallet Balance</span>
                    <p id="wallet-amount" class="font-semibold text-lg">₹ 0.2</p>
                </div>
                
                
            </div>
        </div>
    </header>

    <div id="wallet" class="tab-content block p-4 max-w-sm mx-auto">
        <h3 class="text-xl font-semibold mb-4 text-center">Wallet</h3>

        <div class="mt-5 w-full max-w-md p-5 bg-white rounded-2xl shadow-md mx-auto">
            <div class="flex flex-col sm:flex-row justify-between items-center mb-5">
                <h3 class="text-lg font-bold text-center sm:text-left">Add Amount to Wallet</h3>
            </div>

            <div class="flex flex-col space-y-4">
                <div>
                    <input id="amount" type="number" placeholder="Enter amount"
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                </div>

                <div>
                    <button
                        class="w-full bg-black text-white font-medium py-2 rounded-md hover:bg-gray-100 hover:text-black focus:outline-black focus:ring-2 focus:bg-gray-600 focus:ring-offset-2"
                        onclick="addMoneyToWallet()"> <!-- Added onclick event -->
                        Add Money to Wallet
                    </button>
                </div>
                <div id="wallet-message" class="text-center mt-3 mb-3"></div>
            </div>
        </div>
    </div>

    <script>
       function addMoneyToWallet() {
            const amountInput = document.getElementById('amount');
            const amount = amountInput.value;
            const messageElement = document.getElementById('wallet-message');

            // Clear previous messages
            messageElement.textContent = '';

            // Validate the input
            if (!amount || isNaN(amount) || amount <= 0) {
                messageElement.textContent = 'Please enter a valid amount.';
                messageElement.style.color = 'red';
                return;
            }

            // Send the request to the backend
            axios.post('/dashboard', {
                    amount: amount,
                }, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    }
                })
                .then(response => {
                    // Display the success message and the updated wallet balance
                    messageElement.innerHTML = `
                        <p style="color: green;">${response.data.message}</p>
                        <p>Your current wallet balance is: ₹ ${response.data.wallet}</p>
                    `;
                    amountInput.value = ''; // Reset the input field
                })
                .catch(error => {
                    console.error(error); // Log the error
                    messageElement.textContent = 'Failed to add money. Please try again.';
                    messageElement.style.color = 'red';
                });
        }

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
