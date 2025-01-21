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
    
            <!-- Right-Aligned Content -->
            <div class="ml-auto flex items-center space-x-6">
                <div class="bg-gray-50 p-2 shadow rounded-lg text-center">
                    <span class="text-gray-600 text-sm">Wallet Balance</span>
                    <p id="wallet-amount" class="font-semibold text-lg">₹ 0.2</p>
                </div>
            </div>
        </div>
    </header>

    <div id="transfer" class="tab-content mt-7 container mx-auto px-4">
        <h3 class="mb-8 font-extrabold text-center">
            History
        </h3>
    
        <!-- Added Overflow-x-auto for responsiveness -->
        <div class="overflow-x-auto max-w-full">
            <table class="text-left overflow-y-auto w-full table-auto">
                <thead class="bg-black text-white">
                    <tr>
                        <th class="p-4">Transaction Type</th>
                        <th class="p-4">User ID</th>
                        <th class="p-4">Date</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Amount</th>
                        <th class="p-4">Transaction ID</th>
                        <th class="p-4">Download Report</th>
                    </tr>
                </thead>
                <tbody class="bg-grey-light max-h-96 overflow-y-auto" id="transaction-table-body">
                    <!-- Transaction rows will be inserted here dynamically -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const apiUrl = "/transactions";

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const tableBody = document.getElementById('transaction-table-body');

                    tableBody.innerHTML = '';

                    data.forEach(transaction => {
                        const row = document.createElement('tr');

                        let transId = transaction.id;
                        console.log('transId', transId);
                        
                        const transactionTypeCell = document.createElement('td');
                        transactionTypeCell.classList.add('p-4');
                        transactionTypeCell.textContent = transaction.transaction_type;

                        const userIdCell = document.createElement('td');
                        userIdCell.classList.add('p-4');
                        userIdCell.textContent = transaction.user_id;

                        const dateCell = document.createElement('td');
                        dateCell.classList.add('p-4');
                        dateCell.textContent = new Date(transaction.datetime).toLocaleString();

                        const statusCell = document.createElement('td');
                        statusCell.classList.add('p-4');
                        statusCell.textContent = transaction.status;

                        const amountCell = document.createElement('td');
                        amountCell.classList.add('p-4');
                        amountCell.textContent = transaction.amount;

                        const transactionIdCell = document.createElement('td');
                        transactionIdCell.classList.add('p-4');
                        transactionIdCell.textContent = transaction.transaction_id;

                        // Create a "Download Report" button
                        const downloadCell = document.createElement('td');
                        downloadCell.classList.add('p-4');
                        const downloadButton = document.createElement('button');
                        downloadButton.textContent = 'Download Report';
                        downloadButton.classList.add('bg-blue-500', 'text-white', 'px-4', 'py-2', 'rounded');
                        downloadButton.addEventListener('click', () => {
                            console.log(transId);
                            downloadReport(transId);
                        });
                        downloadCell.appendChild(downloadButton);

                        // Apply green or red color based on status
                        if (transaction.status === 'success') {
                            statusCell.style.color = 'green';
                        } else if (transaction.status === 'failed') {
                            statusCell.style.color = 'red';
                        }

                        // Append cells to the row
                        row.appendChild(transactionTypeCell);
                        row.appendChild(userIdCell);
                        row.appendChild(dateCell);
                        row.appendChild(statusCell);
                        row.appendChild(amountCell);
                        row.appendChild(transactionIdCell);
                        row.appendChild(downloadCell);

                        tableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error('Error fetching transactions:', error);
                });
        });

        // Function to download the report as a PDF
        function downloadReport(transactionId) {
            const apiUrl = `/transactions/${transactionId}/download-pdf`;

            fetch(apiUrl, {
                method: 'GET',
                headers: {
                    'Accept': 'application/pdf',
                },
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Failed to download the report. Status: ${response.status} - ${response.statusText}`);
                }
                return response.blob();
            })
            .then(blob => {
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = `transaction_${transactionId}.pdf`;
                document.body.appendChild(a);
                a.click();
                a.remove();
            })
            .catch(error => {
                console.error('Error downloading the report:', error);
                alert('Error: Unable to download the report. Please check the logs for more details.');
            });
        }

        function fetchWalletAmount() {
            axios.get('/get-wallet-amount')
                .then(response => {
                    console.log('Response:', response.data);
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
