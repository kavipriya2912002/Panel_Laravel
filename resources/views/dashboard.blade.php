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
                   <div class="flex">
                        <!-- main1 -->
                        <div class="mr-12">
                            <div class="mt-5 w-96 p-5 bg-white rounded-2xl shadow-md text-center">
                                <div class="flex justify-between items-center mb-5">
                                    <h3 class="text-lg font-bold">Balance</h3>
                                    <div class="flex space-x-2">
                                        <button class="w-10 h-10 bg-gray-200 rounded-full text-lg">₹</button>
                                        <button class="w-10 h-10 bg-black text-white rounded-full text-lg">$</button>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold mb-5">$ 8,453.00</div>
                                <div class="flex justify-between">
                                    <div class="flex items-center space-x-2 text-green-500">
                                        <img src="{{ asset('build/assets/uparrow.svg') }}" class="h-5 w-5">
                                        <span>+$ 2,431.00</span>
                                    </div>
                                    <div class="flex items-center space-x-2 text-red-500">
                                        <img src="{{ asset('build/assets/downarrow.svg') }}" class="h-5 w-5">
                                        <span>-$ 526.00</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 w-96 p-5 bg-white rounded-2xl shadow-md">
                                <div class="flex justify-between items-center mb-5">
                                    <h3 class="text-lg font-bold">Information</h3>
                                    <img src="{{ asset('build/assets/pen.svg') }}" class="h-5 w-5">
                                </div>

                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset('build/assets/location.svg') }}">
                                    <p class="ml-2">Location: India</p>
                                </div><br>

                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset('build/assets/address.svg') }}">
                                    <p class="ml-2">Address: Mumbai</p>
                                </div><br>

                                <div class="flex items-center space-x-2">
                                    <img src="{{ asset('build/assets/wallet.svg') }}">
                                    <p class="ml-2">Wallet ID: 6HE46URR677wSR446Ic</p>
                                </div>
                            </div>

                            <div class="mt-5 w-96 p-5 bg-white rounded-xl shadow-md">
                                <div class="flex justify-between items-center mb-5">
                                    <h3 class="text-lg font-semibold">Security</h3>
                                    <img src="{{ asset('build/assets/dots.svg') }}" class="h-5 w-5">
                                </div>
                                <div class="flex justify-between items-center mb-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="relative w-10 h-10">
                                            <img src="{{ asset('build/assets/p2.svg') }}" class="absolute top-0 left-0 w-full h-full">
                                            <img src="{{ asset('build/assets/p1.svg') }}" class="absolute top-1 left-1 w-4/5 h-4/5">
                                        </div>
                                        <div>2X A Enabled</div>
                                    </div>
                                    <div class="w-10 h-5 bg-black rounded-full relative">
                                        <div class="absolute top-0.5 left-6 w-4 h-4 bg-white rounded-full transition-all"></div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="relative w-10 h-10">
                                            <img src="{{ asset('build/assets/p3.svg') }}" class="absolute top-0 left-0 w-full h-full">
                                            <img src="{{ asset('build/assets/p4.svg') }}" class="absolute top-1 left-1 w-4/5 h-4/5">
                                        </div>
                                        <div>Key</div>
                                    </div>
                                    <button class="px-4 py-1 bg-gray-200 border border-gray-300 rounded-md text-sm hover:bg-gray-300">
                                        Change
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- main2 -->
                        <div class="mt-8 mr-12">
                            <div class="w-96 bg-white rounded-2xl shadow-md overflow-hidden p-5">
                                <div class="mb-5">
                                    <img src="{{ asset('build/assets/pic.png') }}" class="rounded-lg mx-auto">
                                </div>

                                <div>
                                    <h2 class="text-center text-lg font-bold mb-5">Transactions</h2>
                                    <div class="flex justify-center space-x-2 mb-5">
                                        <button class="flex-1 py-2 bg-black text-white rounded-full">Send</button>
                                        <button class="flex-1 py-2 bg-gray-200 rounded-full">Apply</button>
                                    </div>
                                    <div>
                                        <label class="text-sm text-gray-500 mb-1 block">Pay to</label>
                                        <div class="bg-gray-100 p-3 rounded-lg text-sm mb-4">
                                            <input type="text" class="w-full bg-transparent focus:outline-none">
                                            <p class="text-xs text-gray-400 mt-1">Please enter the Wallet ID or Destination email</p>
                                        </div>
                                        <div class="flex gap-4">
                                            <div class="flex-1">
                                                <label class="text-sm text-gray-500 mb-1 block">Amount</label>
                                                <input type="text" value="$ 400" class="w-full p-2 rounded-lg border">
                                            </div>
                                            <div class="flex-1">
                                                <label class="text-sm text-gray-500 mb-1 block">Reason</label>
                                                <input type="text" value="Shopping" class="w-full p-2 rounded-lg border">
                                            </div>
                                        </div>
                                        <div class="mt-4 text-sm">
                                            <p>Commission: <span class="text-gray-500">$5</span></p>
                                            <p>Total: <span class="text-gray-500">$405</span></p>
                                        </div>
                                        <button class="w-full py-3 mt-4 bg-gradient-to-r from-pink-500 to-pink-300 text-white rounded-full text-lg">
                                            Send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- main3 -->
                        <div class="flex flex-col items-center space-y-5">
                            <img src="{{ asset('build/assets/i2.png') }}" class="w-44 h-48 rounded-2xl">
                            <img src="{{ asset('build/assets/i3.png') }}" class="w-44 h-48 rounded-2xl">
                            <img src="{{ asset('build/assets/i1.png') }}" class="w-44 h-48 rounded-2xl">
                        </div>
                    </div>
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

    </script>
</x-app-layout>
