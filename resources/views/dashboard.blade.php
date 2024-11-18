<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mobile Recharge Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="flex">
            <!-- Sidebar -->
            <div class="bg-white shadow left-0 top-0 p-6 flex flex-col gap-4" style="width: 222px;">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('build/assets/vector.svg') }}" alt="Logo" class="h-8 w-8">
                    <h3 class="font-semibold text-lg text-gray-800">Payme</h3>
                </div>
                <nav class="flex flex-col gap-4">
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600" onclick="showContent('home')">
                        <img src="{{ asset('build/assets/Group.svg') }}" alt="Home Icon" class="h-5 w-5"> 
                        <span class="px-4">Home</span>
                    </a>
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600" onclick="showContent('wallet')">
                        <img src="{{ asset('build/assets/wallet.svg') }}" alt="Wallet Icon" class="h-5 w-5 "> 
                        <span class="px-4">Wallet</span>
                    </a>
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600" onclick="showContent('deposit')">
                        <img src="{{ asset('build/assets/depositwithdraw.svg') }}" alt="Deposit Icon" class="h-5 w-5"> 
                        <span class="px-4">Deposit-Withdraw</span>
                    </a>
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600" onclick="showContent('transfer')">
                        <img src="{{ asset('build/assets/transfer.svg') }}" alt="Transfer Icon" class="h-5 w-5"> 
                        <span class="px-4">Transfers</span>
                    </a>
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600" onclick="showContent('recharge')">
                        <img src="{{ asset('build/assets/mobilerecharge.svg') }}" alt="Recharge Icon" class="h-5 w-5"> 
                        <span class="px-4">Mobile Recharges</span>
                    </a>
                </nav>
            </div>

            <!-- Content Area -->
            <div class="flex-1 p-6">
                <!-- Home Content -->
                <div id="home" class="tab-content">
                    <h3 class="text-xl font-semibold">Home</h3>
                    <p>Welcome to the dashboard! This is the Home section.</p>
                </div>

                <!-- Wallet Content -->
                <div id="wallet" class="tab-content block p-4 max-w-sm mx-auto">
                    <h3 class="text-xl font-semibold mb-4 text-center">Wallet</h3>
                    <div class="space-y-4">
                        <div>
                            <label for="amount" class="block text-sm font-medium text-gray-700">Enter Amount</label>
                            <input 
                                id="amount" 
                                type="number" 
                                placeholder="Enter amount" 
                                class="w-3/4 mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            />
                        </div>
                        <button 
                            class="w-3/4 bg-blue-500 text-white !font-medium py-2 rounded-md hover:!bg-blue-600 focus:outline-none focus:!ring-2 focus:!ring-blue-500 focus:ring-offset-2"
                            onclick="addMoneyToWallet()"> <!-- Added onclick event -->
                            Add Money to Wallet
                        </button>
                        <div id="wallet-message" class="text-center mt-2"></div> <!-- Message Display -->
                    </div>
                </div>
                
                  
                  
                  

                <!-- Deposit Content -->
                <div id="deposit" class="tab-content hidden">
                    <h3 class="text-xl font-semibold">Deposit-Withdraw</h3>
                    <p>This is the Deposit-Withdraw section content.</p>
                </div>

                <!-- Transfer Content -->
                <div id="transfer" class="tab-content hidden">
                    <h3 class="text-xl font-semibold">Transfers</h3>
                    <p>This is the Transfer section content.</p>
                </div>

                <!-- Recharge Content -->
                <div id="recharge" class="tab-content hidden">
                    <h3 class="text-xl font-semibold">Mobile Recharges</h3>
                    <p>This is the Mobile Recharge section content.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to handle tab switching -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function showContent(tabName) {
            // Hide all tab contents
            const contents = document.querySelectorAll('.tab-content');
            contents.forEach(content => {
                content.classList.add('hidden');
            });

            // Show the clicked tab content
            const activeContent = document.getElementById(tabName);
            activeContent.classList.remove('hidden');
        }

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
        console.log(response.data); // Log the response
        messageElement.textContent = response.data.message;
        messageElement.style.color = 'green';
        amountInput.value = ''; // Reset the input field
    })
    .catch(error => {
        console.error(error); // Log the error
        messageElement.textContent = 'Failed to add money. Please try again.';
        messageElement.style.color = 'red';
    });
}

    </script>
</x-app-layout>
