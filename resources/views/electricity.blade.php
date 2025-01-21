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
<body class="bg-gray-100">

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
    
    <div id="electricity" class="tab-content mt-7">
        <div class="max-w-md w-full h-auto p-8 bg-white rounded-lg shadow-lg mx-auto sm:max-w-lg md:max-w-xl">
            <h2 class="text-3xl text-center font-extrabold text-gray-800 mb-8">
                Electricity Bill
            </h2>
            <form id="electricityForm" class="space-y-6">
                <!-- Operator Dropdown -->
                <div class="operator-dropdown">
                    <label for="operator" class="block text-base font-semibold text-gray-700 mb-2">
                        Select your operator:
                    </label>
                    <select id="billsoperator" name="operator"
                        class="w-full p-3 text-base border border-gray-300 rounded-md bg-gray-50 focus:ring-2 focus:ring-black focus:border-black">
                        <option value="" disabled selected>Loading operators...</option>
                    </select>
                </div>

                <!-- Registered Number / Consumer ID -->
                <div>
                    <label for="phone" class="block text-base font-medium text-gray-700 mb-2">
                        Registered Number / Consumer ID / Customer ID:
                    </label>
                    <input type="tel" id="billphone" name="phone"
                        placeholder="Enter your registered number or ID" required
                        class="w-full p-3 text-base border border-gray-300 rounded-md bg-gray-50 focus:ring-2 focus:ring-black focus:border-black placeholder-gray-400">
                </div>

                <!-- Enter Amount -->
                <div>
                    <label for="amount" class="block text-base font-medium text-gray-700 mb-2">
                        Enter Amount:
                    </label>
                    <input id="billamount" type="number" name="amount" placeholder="Enter amount"
                        required
                        class="w-full p-3 text-base border border-gray-300 rounded-md bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">
                </div>

                <!-- Dynamic Fields (if applicable) -->
                <div id="dynamicFields" class="space-y-4"></div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 text-lg font-semibold text-white bg-black rounded-md hover:bg-gray-800 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-800">
                    Proceed
                </button>
            </form>
        </div>
    </div>



    <script>
         document.addEventListener('DOMContentLoaded', () => {
            const billsDropdown = document.getElementById('billsoperator');
            const apiURL = "/operators"; // Ensure this route matches your backend route.

            // Fetch operator list and populate dropdown
            fetch(apiURL)
                .then(response => response.json())
                .then(responseData => {
                    console.log(responseData); // Log the response for debugging.

                    // Populate dropdown with operators (skipping the first 11 entries if required)
                    responseData.data.slice(11).forEach(operator => {
                        const option = document.createElement('option');
                        option.value = operator.id; // Use the appropriate identifier for the operator.
                        option.textContent = operator
                            .operator_name; // Replace `operator_name` with the correct field.
                        billsDropdown.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching operators:', error));
        });

        document.addEventListener('DOMContentLoaded', () => {
            const billForm = document.getElementById('electricityForm');

            // Handle form submission
            billForm.addEventListener('submit', (event) => {
                event.preventDefault();

                const phone = document.getElementById('billphone').value.trim();
                const billID = document.getElementById('billsoperator').value;
                const operatorName = document.getElementById('billsoperator').selectedOptions[0]?.text;
                const amount = document.getElementById('billamount').value.trim();

                // Validation
                if (!phone || !billID || !amount) {
                    alert('Please fill out all fields before submitting!');
                    return;
                }

                // Prepare payload for API
                const payload = {
                    mobile_number: phone,
                    amount: amount,
                    provider: operatorName,
                    operator_id: billID,
                };

                console.log('Payload:', payload);

                fetch('/electricity', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content'),
                        },
                        body: JSON.stringify(payload),
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to send bill payment request.');
                        }
                        return response.json();
                    })
                    .then(data => {


                        if (data.STATUS === 1) {
                            alert(data.MESSAGE);
                            alert(`Your RequestID: ${data.REQUESTTXNID}`);
                            alert(`Your OrderID: ${data.TXNNO}`);
                            billForm.reset();
                        } else {
                            alert(data.error || data.ERROR_MESSAGE ||
                                'Bill payment failed. Please try again.');
                        }
                    })
                    .catch(error => {
                        console.error('Error in bill payment request:', error);
                        alert('Unable to process Bill Payment. Please try again later.');
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