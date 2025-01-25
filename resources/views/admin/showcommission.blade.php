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

<div class="container mx-auto mt-8">
    <h2 class="text-2xl font-bold mb-4">Commissions</h2>

    <!-- Table to display commissions -->
    <table class="table-auto w-full text-sm text-left text-gray-700">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2">User ID</th>
                <th class="px-4 py-2">Service ID</th>
                <th class="px-4 py-2">Service Provider ID</th>
                <th class="px-4 py-2">Range From</th>
                <th class="px-4 py-2">Range To</th>
                <th class="px-4 py-2">Company Type</th>
                <th class="px-4 py-2">Company Value</th>
                <th class="px-4 py-2">Distributor Type</th>
                <th class="px-4 py-2">Distributor Value</th>
                <th class="px-4 py-2">Retailer Type</th>
                <th class="px-4 py-2">Retailer Value</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commission as $comm)
                <tr>
                    <td class="px-4 py-2">{{ $comm->user_id }}</td>
                    <td class="px-4 py-2">{{ $comm->service_id }}</td>
                    <td class="px-4 py-2">{{ $comm->service_provider_id }}</td>
                    <td class="px-4 py-2">{{ $comm->range_from }}</td>
                    <td class="px-4 py-2">{{ $comm->range_to }}</td>
                    <td class="px-4 py-2">{{ $comm->company_type }}</td>
                    <td class="px-4 py-2">{{ $comm->company_value }}</td>
                    <td class="px-4 py-2">{{ $comm->distributor_type }}</td>
                    <td class="px-4 py-2">{{ $comm->distributor_value }}</td>
                    <td class="px-4 py-2">{{ $comm->retailer_type }}</td>
                    <td class="px-4 py-2">{{ $comm->retailer_value }}</td>
                    <td class="px-4 py-2 flex space-x-2">
                        <button onclick="openEditForm({{ $comm->id }})" class="text-blue-500 hover:text-blue-700">Edit</button>
                        <form action="{{ route('commission.destroy', $comm->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this commission?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for editing the commission -->
<div id="editFormModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">
        <h3 class="text-xl font-semibold mb-4">Edit Commission</h3>
        <form id="editForm" action="#" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">User ID</label>
                <input type="text" id="user_id" name="user_id" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="service_id" class="block text-sm font-medium text-gray-700">Service ID</label>
                <input type="text" id="service_id" name="service_id" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="service_provider_id" class="block text-sm font-medium text-gray-700">Service Provider ID</label>
                <input type="text" id="service_provider_id" name="service_provider_id" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="range_from" class="block text-sm font-medium text-gray-700">Range From</label>
                <input type="number" id="range_from" name="range_from" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="range_to" class="block text-sm font-medium text-gray-700">Range To</label>
                <input type="number" id="range_to" name="range_to" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="company_type" class="block text-sm font-medium text-gray-700">Company Type</label>
                <input type="text" id="company_type" name="company_type" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="company_value" class="block text-sm font-medium text-gray-700">Company Value</label>
                <input type="number" id="company_value" name="company_value" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="distributor_type" class="block text-sm font-medium text-gray-700">Distributor Type</label>
                <input type="text" id="distributor_type" name="distributor_type" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="distributor_value" class="block text-sm font-medium text-gray-700">Distributor Value</label>
                <input type="number" id="distributor_value" name="distributor_value" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="retailer_type" class="block text-sm font-medium text-gray-700">Retailer Type</label>
                <input type="text" id="retailer_type" name="retailer_type" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label for="retailer_value" class="block text-sm font-medium text-gray-700">Retailer Value</label>
                <input type="number" id="retailer_value" name="retailer_value" class="mt-1 p-2 w-full border border-gray-300 rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Commission</button>
            <button type="button" onclick="closeEditForm()" class="ml-2 bg-gray-300 text-black px-4 py-2 rounded">Cancel</button>
        </form>
    </div>
</div>

<script>
// Function to open the edit form modal and populate fields
let commissionId = null;
function openEditForm(id) {
    commissionId = id;
    axios.get(`/admin/showcommission/edit/${commissionId}`)
        .then(response => {
            const commissionData = response.data;
            document.getElementById('editFormModal').classList.remove('hidden');
            document.getElementById('user_id').value = commissionData.user_id;
            document.getElementById('service_id').value = commissionData.service_id;
            document.getElementById('service_provider_id').value = commissionData.service_provider_id;
            document.getElementById('range_from').value = commissionData.range_from;
            document.getElementById('range_to').value = commissionData.range_to;
            document.getElementById('company_type').value = commissionData.company_type;
            document.getElementById('company_value').value = commissionData.company_value;
            document.getElementById('distributor_type').value = commissionData.distributor_type;
            document.getElementById('distributor_value').value = commissionData.distributor_value;
            document.getElementById('retailer_type').value = commissionData.retailer_type;
            document.getElementById('retailer_value').value = commissionData.retailer_value;
            // Set form action URL for updating
            document.getElementById('editForm').action = `/admin/showcommission/${commissionData.id}`;
        })
        .catch(error => {
            console.error('Error fetching commission data:', error);
        });
}

// Function to close the edit form modal
function closeEditForm() {
    document.getElementById('editFormModal').classList.add('hidden');
}



document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);

    // Log FormData content
    formData.forEach(function(value, key) {
        console.log(key + ": " + value);
    });

    // Ensure CSRF token is included in request headers (if needed)
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Send the data via Axios PUT request
    axios.put(`/admin/showcommission/${commissionId}`, formData)
        .then(response => {
            if (response.data.success) {
                alert('Commission updated successfully!');
                closeEditForm();
                location.reload();
            } else {
                alert('Failed to update commission. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error updating commission:', error);
            alert('An error occurred while updating the commission.');
        });
});


</script>

</body>
</html>
