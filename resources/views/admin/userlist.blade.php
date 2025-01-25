<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Admin Panel</title>
</head>

<body class="bg-gray-100">

    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between">
            <a href="{{ route('admin.index') }}" class="text-2xl font-bold text-center sm:text-left">
                Admin Panel
            </a>
            <div class="flex items-center space-x-6 mt-4 sm:mt-0">
                <button id="logout-button" class="text-black font-bold px-4 py-2 rounded-lg">
                    Logout
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <div class="flex justify-center mt-4 items-start min-h-screen px-4 sm:px-6 lg:px-8">
        <div id="user-list" class="w-full lg:w-3/4 p-6 bg-white rounded-lg shadow-lg">
            <div id="userList" class="content-section">
                <h3 class="text-lg font-bold mb-4 text-center">List of Registered Users</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse border border-gray-300 text-center">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">Name</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Registered At</th>
                                <th class="border border-gray-300 px-4 py-2">Wallet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $user->created_at->format('d M Y, h:i A') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <button class="bg-black p-2 rounded-lg text-white" type="button"
                                            onclick="showWalletPopup({{ $user->id }})">
                                            Add amount to wallet
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Wallet Popup Modal -->
    <div id="wallet-popup" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full sm:w-96">
            <h3 class="text-xl font-bold mb-4">Add Amount to Wallet</h3>
            <label for="amount" class="block text-sm font-medium">Amount</label>
            <input type="number" id="amount" class="w-full p-2 border border-gray-300 rounded-lg mb-4" placeholder="Enter amount" />
            <div id="wallet-message" class="mb-4"></div>
            <div class="flex justify-between">
                <button onclick="closeWalletPopup()" class="bg-gray-300 text-black px-4 py-2 rounded-lg">Cancel</button>
                <button onclick="submitWalletAmount()" class="bg-green-500 text-white px-4 py-2 rounded-lg">Submit</button>
            </div>
        </div>
    </div>

    <!-- Logout Modal -->
    <div id="logout-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg w-full sm:w-1/3">
            <h3 class="text-xl font-bold mb-4">Are you sure you want to log out?</h3>
            <div class="flex justify-between">
                <button id="logout-cancel" class="px-4 py-2 bg-gray-300 text-black rounded-lg">Cancel</button>
                <button id="logout-confirm" class="px-4 py-2 bg-red-500 text-white rounded-lg">Log Out</button>
            </div>
        </div>
    </div>

    <script>
        let selectedUserId = null;
        
        // Show the wallet popup
        function showWalletPopup(userId) {
            selectedUserId = userId; // Store the user ID
            const walletPopup = document.getElementById('wallet-popup');
            walletPopup.classList.remove('hidden'); // Show the popup
            console.log("Selected User ID:", selectedUserId); // For debugging
        }
        
        // Close the wallet popup
        function closeWalletPopup() {
            const walletPopup = document.getElementById('wallet-popup');
            walletPopup.classList.add('hidden'); // Hide the popup
            selectedUserId = null; // Reset the selected user ID
        }
        
        // Add money to wallet function
        function submitWalletAmount() {
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
            
            if (!selectedUserId) {
                alert('User ID is not selected.');
                return;
            }
            
            axios.post('/admin/add-amount', {
                    amount: amount,
                    userId: selectedUserId
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
                
                // Hide popup after submitting
                closeWalletPopup();
            }
            
            document.getElementById('logout-button').addEventListener('click', () => {
                document.getElementById('logout-modal').classList.remove('hidden');
            });
            document.getElementById('logout-cancel').addEventListener('click', () => {
                document.getElementById('logout-modal').classList.add('hidden');
            });
            document.getElementById('logout-confirm').addEventListener('click', () => {
                axios.post('/admin/logout')
                    .then(() => window.location.href = '/admin/login')
                    .catch(error => alert('Logout failed. Please try again.'));
            });
    </script>

</body>

</html>
