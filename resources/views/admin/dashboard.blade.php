<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white p-4">
            <ul>
                <li class="mb-4">
                    <button onclick="showSection('user-list')" class="w-full text-center">User List</button>
                </li>
                <hr>
                <li class="mb-4 mt-2">
                    <button onclick="showSection('login-status')" class="w-full text-center">Login Status</button>
                </li>
                
            </ul>
        </div>

        <!-- Content -->
        <div id="user-list" class="w-full lg:w-3/4 p-6">
            <div id="userList" class="content-section">
                <h3 class="text-lg font-bold mb-4">List of Registered Users</h3>
                <table class="min-w-full border-collapse border border-gray-300">
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
                        @foreach($users as $user)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->created_at->format('d M Y, h:i A') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <!-- Add user_id as a data attribute -->
                                    <button class="bg-black p-2 rounded-lg text-white" 
                                            type="button" 
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
        


        <!-- Add this outside the user list table -->
        <div id="wallet-popup" class="hidden fixed inset-0 flex items-center justify-center backdrop-blur-md bg-gray-100 bg-opacity-50 z-50">
            <div id="wallet" class="relative tab-content block p-4 max-w-sm bg-white rounded-lg shadow-lg">
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
                                onclick="submitWalletAmount()"> 
                                Add Money to Wallet
                            </button>
                        </div>
                        <div id="wallet-message" class="text-center mt-3 mb-3"></div>
                    </div>
                    <!-- Close button -->
                    <button class="absolute top-3 right-3 text-black font-bold" onclick="closeWalletPopup()">✕</button>
                </div>
            </div>
        </div>
        
        
        


        <div id="login-status" class="w-full lg:w-3/4 p-6 hidden">
            <h3 class="text-lg font-bold mb-4">Login Requests</h3>
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">User</th>
                        <th class="border border-gray-300 px-4 py-2">Requested At</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $request->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $request->created_at->format('d M Y, h:i A') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form method="POST" action="{{ route('admin.updateStatus', $request->id) }}" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="allow">
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white">Allow</button>
                                </form>
                                
                                <form method="POST" action="{{ route('admin.updateStatus', $request->id) }}" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>


    <style>
        #wallet {
    position: relative;
    z-index: 10; /* Ensure it’s above the backdrop */
}

#wallet-popup {
    z-index: 50; /* Ensure this is higher than other elements */
}

        #wallet-popup.show {
            display: flex;
        }
    </style>
    
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

    if (!amount || isNaN(amount) || amount <= 0) {
        alert('Please enter a valid amount.');
        return;
    }

    if (!selectedUserId) {
        alert('User ID is not selected.');
        return;
    }

    // Replace this with your API call or backend logic
    console.log(`Adding ${amount} to wallet for User ID: ${selectedUserId}`);

    // Hide popup after submitting
    closeWalletPopup();
}


        function showSection(section) {
            document.getElementById('user-list').classList.add('hidden');
            document.getElementById('login-status').classList.add('hidden');
            document.getElementById(section).classList.remove('hidden');
        }
    </script>
</x-app-layout>
