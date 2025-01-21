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
                <a href="{{ route('home') }}" class="text-2xl font-bold">
                    BBPS Panel
                </a>
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
    


    <div id="dthrecharge" class="tab-content mt-7 px-4">
        <div class="flex flex-wrap gap-2">

            <div
                class="max-w-sm w-full p-6 bg-white rounded-lg shadow-md mx-auto h-96 sm:max-w-md md:max-w-lg">
                <h2 class="text-xl text-center font-extrabold text-gray-800 mb-4">DTH Recharge
                </h2>
                <form id="dthrechargeForm">
                    <label for="phone" class="block text-sm text-gray-600 mb-1">Registered Number /
                        Customer ID</label>
                    <input type="tel" id="dthphone" name="phone"
                        placeholder="Enter your phone number" required
                        class="w-full sm:w-3/4 md:w-1/2 p-2 text-sm border border-gray-300 rounded-md mb-4 focus:border-black focus:ring-1 focus:ring-gray-500">

                    <div class="operator-dropdown mb-4">
                        <label for="operator" class="block text-sm text-gray-600 mb-1">Select your
                            operator:</label>
                        <select id="dthoperator" name="operator"
                            class="w-full p-2 text-sm border border-gray-300 rounded-md focus:border-black focus:ring-1 focus:ring-gray-500">
                            <option value="" disabled selected>Loading operators...</option>
                        </select>
                    </div>
                    <label for="amount" class="text-sm text-gray-600">Enter Amount</label>
                    <input id="dthrechargeamount" type="number" name="amount" placeholder="Enter amount"
                        required
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                    <button type="submit"
                        class="w-full p-3 bg-black mt-3 text-white text-sm font-semibold rounded-md hover:bg-gray-400 hover:text-black hover:focus:border-black transition-colors">
                        Proceed To Recharge
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const operatorDropdown = document.getElementById('dthoperator');

            // Fetch operator list from backend
            const apiUrl = "/operators";

            fetch(apiUrl)
                .then(response => response.json())
                .then(responseData => {
                    console.log(responseData); // Log the response to verify
                    if (responseData.success && Array.isArray(responseData.data)) {
                        operatorDropdown.innerHTML =
                            '<option value="" disabled selected>Select your operator</option>';
                        responseData.data.slice(5).forEach(operator => { // Start slicing from the 5th index
                            const option = document.createElement('option');
                            option.value = operator.id; // operator.id is stored as value
                            option.textContent = operator.operator_name; // Display operator name
                            operatorDropdown.appendChild(option);
                        });

                    } else {
                        operatorDropdown.innerHTML =
                            '<option value="" disabled>Error loading operators</option>';
                    }
                })
                .catch(error => {
                    console.error("Error fetching operators:", error);
                    operatorDropdown.innerHTML = '<option value="" disabled>Error loading operators</option>';
                });
        });




        document.addEventListener('DOMContentLoaded', () => {
            const rechargeForm = document.getElementById('dthrechargeForm');

            rechargeForm.addEventListener('submit', (event) => {
                event.preventDefault();

                // Retrieve values from the form
                const phone = document.getElementById('dthphone').value.trim();
                const operatorID = document.getElementById('dthoperator').value; // Get selected operator ID
                const operatorName = document.getElementById('dthoperator').selectedOptions[0]
                    .text; // Get selected operator name
                const amountElement = document.getElementById('dthrechargeamount');
                const amount = amountElement ? amountElement.value.trim() : '';

                // Debugging: Log retrieved values
                console.log('Phone:', phone);
                console.log('Selected Operator ID:', operatorID); // Log the selected operator ID
                console.log('Selected Operator Name:', operatorName); // Log the selected operator name
                console.log('Amount Element:', amountElement);
                console.log('Amount Value:', amount);

                // Check if all fields are filled
                if (!phone || !operatorID || !amount) {
                    alert('Please fill out all fields before submitting!');
                    return;
                }

                // Prepare data payload
                const payload = {
                    mobile_number: phone,
                    amount: amount,
                    provider: operatorName, // Send operator name as provider
                    operator_id: operatorID, // Send selected operator ID
                };
                console.log('Payload:', payload); // Log payload to check the structure

                // Send data to backend
                fetch('/recharge', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                        },
                        body: JSON.stringify(payload),
                    })
                    .then(response => {
                        console.log('Response Status:', response.status); // Log status code
                        return response.json();
                    })
                    .then(data => {
                        console.log('API Response:', data); // Log the entire API response
                        if (data.apiResponse) {
                            var info = data.apiResponse; // Ensure apiResponse exists in data

                            // Checking for successful status
                            if (info.STATUS === 1) {
                                // Successful recharge
                                rechargeForm.reset();
                                alert(info.MESSAGE); // Show success message
                                alert(`Your RequestID: ${info.REQUESTTXNID}`); // Show RequestTXNID
                                alert(`Your OrderID: ${info.TXNNO}`); // Show TXNNO
                            } else {
                                // Handle failure
                                console.log('Error Message:', info.ERROR_MASSAGE);
                                alert(info.ERROR_MASSAGE || info.error ||
                                    'Recharge failed. Please try again.');
                            }
                        } else {
                            alert('Unexpected response from the server.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Something went wrong. Please try again later.');
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