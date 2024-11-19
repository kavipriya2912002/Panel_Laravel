<link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600"
                        onclick="showContent('home')">
                        <img src="{{ asset('build/assets/Group.svg') }}" alt="Home Icon" class="h-5 w-5">
                        <span class="px-4">Home</span>
                    </a>
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600"
                        onclick="showContent('wallet')">
                        <img src="{{ asset('build/assets/wallet.svg') }}" alt="Wallet Icon" class="h-5 w-5 ">
                        <span class="px-4">Wallet</span>
                    </a>
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600"
                        onclick="showContent('deposit')">
                        <img src="{{ asset('build/assets/depositwithdraw.svg') }}" alt="Deposit Icon" class="h-5 w-5">
                        <span class="px-4">Deposit-Withdraw</span>
                    </a>
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600"
                        onclick="showContent('transfer')">
                        <img src="{{ asset('build/assets/transfer.svg') }}" alt="Transfer Icon" class="h-5 w-5">
                        <span class="px-4">Transactions</span>
                    </a>
                    <a href="#" class="flex items-center text-gray-600 p-4 hover:text-indigo-600"
                        onclick="showContent('recharge')">
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

                            <div class="mt-5 w-96 p-5 mb-3 bg-white rounded-2xl shadow-md">
                                <div class="flex justify-between items-center mb-5">
                                    <h3 class="text-lg font-bold">Information</h3>
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

                            <div class="mt-5 w-96 p-5 mb-3 bg-white rounded-xl shadow-md">
                                <div class="flex justify-between items-center mb-5">
                                    <h3 class="text-lg font-semibold">Security</h3>
                                    <img src="{{ asset('build/assets/dots.svg') }}" class="h-5 w-5">
                                </div>
                                <div class="flex justify-between items-center mb-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="relative w-10 h-10">
                                            <img src="{{ asset('build/assets/p2.svg') }}"
                                                class="absolute top-0 left-0 w-full h-full">
                                            <img src="{{ asset('build/assets/p1.svg') }}"
                                                class="absolute top-1 left-1 w-4/5 h-4/5">
                                        </div>
                                        <div>2X A Enabled</div>
                                    </div>
                                    <div class="w-10 h-5 bg-black rounded-full relative">
                                        <div
                                            class="absolute top-0.5 left-6 w-4 h-4 bg-white rounded-full transition-all">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-3">
                                        <div class="relative w-10 h-10">
                                            <img src="{{ asset('build/assets/p3.svg') }}"
                                                class="absolute top-0 left-0 w-full h-full">
                                            <img src="{{ asset('build/assets/p4.svg') }}"
                                                class="absolute top-1 left-1 w-4/5 h-4/5">
                                        </div>
                                        <div>Key</div>
                                    </div>
                                    <button
                                        class="px-4 py-1 bg-gray-200 border border-gray-300 rounded-md text-sm hover:bg-gray-300">
                                        Change
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- main2 -->
                        <div
                            class="w-full max-w-3xl h-[650px] bg-white rounded-lg shadow-lg flex flex-col items-center overflow-hidden mr-8">
                            <img src="{{ asset('build/assets/3487900.jpg') }}" alt="Large Image"
                                class="w-1/2 h-[350px] object-cover mt-4">
                            <div class="p-5 text-center">
                                <h2 class="mt-4 text-3xl font-bold text-gray-800">Accept payments online with ease</h2>
                                <p class="mt-4 text-lg text-gray-600 px-12 leading-7">
                                    Grow your business with the payment gateway that powers India’s largest brands and
                                    even the Paytm App.
                                </p>
                                <p class="mt-2 text-lg text-gray-600 px-12 leading-7">
                                    Millions of small & big businesses use Paytm to accept payments anywhere anytime
                                    with a wide range of solutions for all kinds of merchants.
                                </p>
                            </div>
                        </div>


                        <!-- main3 -->
                        <div class="flex flex-col items-center space-y-5">
                            <img src="{{ asset('build/assets/i2.png') }}" class="w-44 h-48 rounded-2xl mb-3">
                            <img src="{{ asset('build/assets/i3.png') }}" class="w-44 h-48 rounded-2xl mb-3">
                            <img src="{{ asset('build/assets/i1.png') }}" class="w-44 h-48 rounded-2xl mb-3">
                        </div>
                    </div>
                </div>



                <!-- Wallet Content -->
                <div id="wallet" class="tab-content block p-4 max-w-sm mx-auto">
                    <h3 class="text-xl font-semibold mb-4 text-center">Wallet</h3>

                    <div class="mt-5 w-96 p-5 bg-white rounded-2xl shadow-md">
                        <div class="flex justify-between items-center mb-5">
                            <h3 class="text-lg font-bold">Add Amount to Wallet</h3>
                        </div>

                        <div class="flex flex-col space-y-4">
                            <div>

                                <input id="amount" type="number" placeholder="Enter amount"
                                    class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                            </div>

                            <div>
                                <button
                                    class="w-full bg-blue-500 text-white !font-medium py-2 rounded-md hover:!bg-blue-600 focus:outline-none focus:!ring-2 focus:!ring-blue-500 focus:ring-offset-2"
                                    onclick="addMoneyToWallet()"> <!-- Added onclick event -->
                                    Add Money to Wallet
                                </button>
                            </div>
                            <div id="wallet-message" class="text-center mt-3 mb-3"></div>
                        </div>
                    </div>
                </div>






                <!-- Deposit Content -->
                <div id="deposit" class="tab-content hidden">
                    <h3 class="text-xl font-semibold">Deposit-Withdraw</h3>
                    <p>This is the Deposit-Withdraw section content.</p>
                </div>

                <!-- Transfer Content -->
                <div id="transfer" class="tab-content hidden">
                    <!-- Transaction Table -->
                    <table class="min-w-full table-auto mt-4 bg-white shadow-lg rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="px-6 py-3 text-left font-medium">Wallet ID</th>
                                <th class="px-6 py-3 text-left font-medium">Type</th>
                                <th class="px-6 py-3 text-left font-medium">Amount</th>
                                <th class="px-6 py-3 text-left font-medium">Reason</th>
                                <th class="px-6 py-3 text-left font-medium">Transaction ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">W12345</td>
                                <td class="px-6 py-4">Debit</td>
                                <td class="px-6 py-4">$500</td>
                                <td class="px-6 py-4">Payment for service</td>
                                <td class="px-6 py-4">T123456789</td>
                            </tr>
                            <!-- Repeat rows for other transactions -->
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">W12346</td>
                                <td class="px-6 py-4">Credit</td>
                                <td class="px-6 py-4">$100</td>
                                <td class="px-6 py-4">Refund</td>
                                <td class="px-6 py-4">T987654321</td>
                            </tr>
                            <!-- Add more rows as necessary -->
                        </tbody>
                    </table>
                </div>
                
                

                <!-- Recharge Content -->
                <div id="recharge" class="tab-content hidden">

                    <div class="flexwrapper">
                        <div class="main">
                            <h2>Recharge or Pay Mobile Bill</h2>
                            <form>
                                <label>
                                    <input type="radio" name="recharge"> Prepaid
                                </label>
                                <label>
                                    <input type="radio" name="recharge"> Postpaid
                                </label><br>
                                <label for="phone">Phone Number:</label>
                                <input type="tel" id="phone" name="phone"
                                    placeholder="Enter your phone number" required><br>
                                <br>
                                <div class="custom-dropdown">
                                    <div class="selected-operator">Select your operator</div>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-item" data-value="airtel">
                                            <img src="build/assets/airtel.png" alt="Airtel Logo">
                                            <span>Airtel</span>
                                        </div>
                                        <div class="dropdown-item" data-value="jio">
                                            <img src="build/assets/jio.png" alt="Jio Logo">
                                            <span>Jio</span>
                                        </div>
                                        <div class="dropdown-item" data-value="vodafone">
                                            <img src="build/assets/voda.jpg" alt="Vodafone Logo">
                                            <span>Vodafone</span>
                                        </div>
                                        <div class="dropdown-item" data-value="bsnl">
                                            <img src="build/assets/bsnl.png" alt="BSNL Logo">
                                            <span>BSNL</span>
                                        </div>
                                        <div class="dropdown-item" data-value="mtnl">
                                            <img src="build/assets/mtnl.png" alt="MTNL Logo">
                                            <span>MTNL</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="amount">
                                    <div class="a1">
                                        <label for="amount">Enter Amount</label>
                                        <input type="text">
                                    </div>
                                    <div class="a2">
                                        <a href="#">Browse Plans</a>
                                        <p>of all operators</p>
                                    </div>

                                </div>
                                <button type="submit">Proceed To Recharge</button>
                            </form>

                        </div><br>


                        <div class="max-w-screen-l mx-auto my-6 bg-white p-5 rounded-lg shadow-md">
                            <h1 class="text-2xl font-bold mb-4 text-gray-800">Browse Plans</h1>
                            <hr>

                            <h1 class="text-2xl font-bold mb-4 text-gray-800">Browse Plans of Jio - Andhra</h1>
                            <div class="flex gap-4 mb-6">
                                <button onclick="showTable('recommended')"
                                    class="py-2 px-4 bg-blue-600 text-white rounded-lg border border-blue-600 cursor-pointer active:bg-blue-700 active:text-white">
                                    Recommended
                                </button>
                                <button onclick="showTable('unlimited')"
                                    class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-600 hover:text-white">
                                    True Unlimited
                                </button>
                                <button onclick="showTable('data')"
                                    class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-600 hover:text-white">
                                    Data Add On
                                </button>
                                <button onclick="showTable('entertainment')"
                                    class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-600 hover:text-white">
                                    Entertainment
                                </button>
                                <button onclick="showTable('international')"
                                    class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-600 hover:text-white">
                                    International Roaming
                                </button>
                                <button onclick="showTable('discontinued')"
                                    class="py-2 px-4 bg-gray-100 text-gray-700 rounded-lg border border-gray-300 cursor-pointer hover:bg-blue-600 hover:text-white">
                                    Discontinued Plans
                                </button>
                            </div>


                            <div id="recommended" class="table-container"
                                style="display: block; max-height: 300px; border: 1px solid #ccc;">
                                <table class="table-auto w-full border-collapse border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Description
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- True Unlimited Table -->
                            <div id="unlimited" class="table-container"
                                style="display: none; overflow-x: auto; max-width: 100%;">
                                <table class="table-auto w-full border-collapse border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Description
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Data Add On Table -->
                            <div id="data" class="table-container"
                                style="display: block; overflow-x: auto; max-width: 100%;">
                                <table class="table-auto w-full border-collapse border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Description
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Maharashtra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">24 GB</td>
                                            <td class="px-4 py-2 border">336 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 50 SMS for 28 days</td>
                                            <td class="px-4 py-2 border">Rs. 895</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- True Unlimited Table -->
                            <div id="entertainment" class="table-container"
                                style="display: none; overflow-x: auto; max-width: 100%;">
                                <table class="table-auto w-full border-collapse border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Description
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Mumbai</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">1.5 GB/day</td>
                                            <td class="px-4 py-2 border">84 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 555</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Data Add On Table -->
                            <div id="international" class="table-container"
                                style="display: none; overflow-x: auto; max-width: 100%;">
                                <table class="table-auto w-full border-collapse border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Description
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-2 border">Delhi</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">2 GB/day</td>
                                            <td class="px-4 py-2 border">56 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 444</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Delhi</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">2 GB/day</td>
                                            <td class="px-4 py-2 border">56 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 444</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Delhi</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">2 GB/day</td>
                                            <td class="px-4 py-2 border">56 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 444</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div id="discontinued" class="table-container"
                                style="display: none; overflow-x: auto; max-width: 100%;">
                                <table class="table-auto w-full border-collapse border border-gray-200">
                                    <thead>
                                        <tr class="bg-gray-100 border-b border-gray-200">
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Circle</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Plan type
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Data</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Validity</th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Description
                                            </th>
                                            <th class="p-3 text-left text-sm font-semibold text-gray-600">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="px-4 py-2 border">Andhra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">2 GB/day</td>
                                            <td class="px-4 py-2 border">56 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 565</td>
                                        </tr>
                                        <tr>
                                            <td class="px-4 py-2 border">Andhra</td>
                                            <td class="px-4 py-2 border">Recharge</td>
                                            <td class="px-4 py-2 border">2 GB/day</td>
                                            <td class="px-4 py-2 border">56 Days</td>
                                            <td class="px-4 py-2 border">Unlimited Calls | 100 SMS/day</td>
                                            <td class="px-4 py-2 border">Rs. 565</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-sm text-gray-600 mt-10 bg-gray-100 p-6 rounded-lg">
                                <strong>Disclaimer:</strong> While we support most recharges, we request you to verify
                                with your operator once before proceeding.
                            </p>
                        </div>



                    </div>
                    <div class="title">
                        <h2>Select An Operator</h2>

                        <div class="image flex ">
                            <div class="item">
                                <img src="build/assets/airtel.png" alt="Airtel Logo"> Airtel
                            </div>
                            <div class="item" id="jio">
                                <img src="build/assets/jio.png" alt="Jio Logo"> Jio
                            </div>
                            <div class="item" id="voda">
                                <img src="build/assets/voda.jpg" alt="Vodafone Logo"> Vodafone
                            </div>
                            <div class="item">
                                <img src="build/assets/bsnl.png" alt="BSNL Logo"> BSNL
                            </div>
                            <div class="item">
                                <img src="build/assets/mtnl.png" alt="MTNL Logo"> MTNL
                            </div>

                        </div>
                    </div>
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




        function toggleDropdownMenu(event) {
            const dropdownMenu = this.querySelector('.dropdown-menu');

            // Close other open menus
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== dropdownMenu) menu.style.display = 'none';
            });

            // Toggle current menu
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';

            event.stopPropagation();
        }

        function selectDropdownItem(event) {
            const selectedOperator = this.querySelector('span').textContent.trim();
            const operatorInput = document.getElementById('operator');
            const selectedDiv = document.querySelector('.selected-operator');

            // Update the selected operator and hidden input value
            if (selectedDiv) selectedDiv.textContent = selectedOperator;
            if (operatorInput) operatorInput.value = this.dataset.value;

            // Hide dropdown menu
            const dropdownMenu = this.closest('.dropdown-menu');
            if (dropdownMenu) dropdownMenu.style.display = 'none';

            event.stopPropagation();
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Toggle dropdown menu on click
            const dropdownWrappers = document.querySelectorAll('.custom-dropdown');
            dropdownWrappers.forEach(wrapper => {
                wrapper.addEventListener('click', toggleDropdownMenu);
            });

            // Handle dropdown item selection
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            dropdownItems.forEach(item => {
                item.addEventListener('click', selectDropdownItem);
            });

            // Close dropdown if clicked outside
            document.addEventListener('click', function() {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            });
        });


        function showTable(tableId) {
            // Hide all tables
            const tables = document.querySelectorAll('.table-container');
            tables.forEach(table => table.style.display = 'none');

            // Show the selected table
            document.getElementById(tableId).style.display = 'block';
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
