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

    <div id="fetch" class="tab-content mt-7">
        <div class="max-w-lg w-full h-auto p-6 bg-white rounded-lg shadow-md mx-auto">
            <h2 class="text-xl text-center font-extrabold text-gray-800 mb-4">Fetch Bill Details</h2>
            <form id="fetchForm">
                <div class="mb-4">
                    <label for="serviceNumber" class="block text-sm font-medium text-gray-700 mb-2">
                        Enter Service Number
                    </label>
                    <input type="text" id="serviceNumber" name="serviceNumber"
                        placeholder="Enter your service number"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        required />
                </div>
                <button type="submit"
                    class="w-full p-3 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-400 hover:text-black focus:ring-2 focus:ring-black focus:outline-none transition-colors">
                    Fetch Bill
                </button>
            </form>
            <!-- Placeholder for Bill Details -->
            <div id="billDetails" class="mt-6 p-4 bg-gray-100 rounded-md hidden">
                <!-- Dynamically populate bill details here -->
                <h3 class="text-lg font-semibold text-gray-700">Bill Details</h3>
                <p id="billContent" class="text-sm text-gray-600 mt-2"></p>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const fetchForm = document.getElementById('fetchForm');
            const billDetails = document.getElementById('billDetails');
            const billContent = document.getElementById('billContent');

            fetchForm.addEventListener('submit', (event) => {
                event.preventDefault();

                // Retrieve values from the form
                const num = document.getElementById('serviceNumber').value.trim();

                // Check if the field is filled
                if (!num) {
                    alert('Please fill out the service number field before submitting!');
                    return;
                }

                // Prepare data payload
                const payload = {
                    num
                };

                // Send data to the backend
                fetch('/fetchbill', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                        },
                        body: JSON.stringify(payload),
                    })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then((data) => {
                        console.log('Bill details Response:', data);

                        // Display the bill details
                        if (data && Object.keys(data).length) {
                            billContent.innerHTML = `
                        <p><strong>Service Number:</strong> ${data.DATA.Amount || 'N/A'}</p>
                        <p><strong>Bill Amount:</strong> ${data.DATA.Bill_No || 'N/A'}</p>
                        <p><strong>Customer Name:</strong> ${data.DATA.Customer || 'N/A'}</p>
                         <p><strong>Due Date:</strong> ${data.DATA.DueDate || 'N/A'}</p>
                        <p><strong>Status:</strong> ${data.STATUS || 'N/A'}</p>
                        <p><strong>REF ID:</strong> ${data.REFID || 'N/A'}</p>
                    `;
                            billDetails.classList.remove('hidden');
                        } else {
                            billContent.innerHTML =
                                '<p class="text-red-600">No bill details found for the provided service number.</p>';
                            billDetails.classList.remove('hidden');
                        }
                    })
                    .catch((error) => {
                        console.error('Error in fetch request:', error);
                        billContent.innerHTML =
                            '<p class="text-red-600">An error occurred while fetching the bill details. Please try again.</p>';
                        billDetails.classList.remove('hidden');
                    });
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
