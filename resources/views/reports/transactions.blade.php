<!DOCTYPE html>
<html>
<head>
    <title>Transaction Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Transaction Report</h1>
    <table>
        <tr><th>Transaction Type</th><td>{{ $transactionType }}</td></tr>
        <tr><th>User ID</th><td>{{ $userId }}</td></tr>
        <tr><th>Date</th><td>{{ $date }}</td></tr>
        <tr><th>Status</th><td>{{ $status }}</td></tr>
        <tr><th>Amount</th><td>{{ $amount }}</td></tr>
        <tr><th>Transaction ID</th><td>{{ $transactionId }}</td></tr>
    </table>
</body>
</html>
