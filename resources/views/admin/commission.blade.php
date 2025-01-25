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

        <!-- Centering the form container -->
        <div id="set-commission" class="bg-white shadow-md rounded-lg p-8 max-w-lg w-full mx-auto mt-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Commission</h1>
            <form action="{{ route('commission.store') }}" method="POST" class="space-y-4">
                @csrf

                <!-- User ID Dropdown -->
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700">User ID:</label>
                    <select name="user_id" id="user_id" required
                            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Select User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Service ID Dropdown -->
                <div>
                    <label for="service_id" class="block text-sm font-medium text-gray-700">Service ID:</label>
                    <select name="service_id" id="service_id" required
                            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Select Service</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->service_type }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Service Provider ID Dropdown -->
                <div>
                    <label for="service_provider_id" class="block text-sm font-medium text-gray-700">Service Provider ID:</label>
                    <select name="service_provider_id" id="service_provider_id" required
                            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Select Service Provider</option>
                        @foreach($serviceProviders as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->sp_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="range_from" class="block text-sm font-medium text-gray-700">Range From:</label>
                    <input type="number" step="0.01" name="range_from" id="range_from" required
                        class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="range_to" class="block text-sm font-medium text-gray-700">Range To:</label>
                    <input type="number" step="0.01" name="range_to" id="range_to" required
                        class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="company_type" class="block text-sm font-medium text-gray-700">Company Type:</label>
                    <select name="company_type" id="company_type" required
                            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="flat">Flat</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="company_value" class="block text-sm font-medium text-gray-700">Company Value:</label>
                    <input type="number" step="0.01" name="company_value" id="company_value" required
                        class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="distributor_type" class="block text-sm font-medium text-gray-700">Distributor Type:</label>
                    <select name="distributor_type" id="distributor_type" required
                            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="flat">Flat</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="distributor_value" class="block text-sm font-medium text-gray-700">Distributor Value:</label>
                    <input type="number" step="0.01" name="distributor_value" id="distributor_value" required
                        class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div>
                    <label for="retailer_type" class="block text-sm font-medium text-gray-700">Retailer Type:</label>
                    <select name="retailer_type" id="retailer_type" required
                            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="flat">Flat</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="retailer_value" class="block text-sm font-medium text-gray-700">Retailer Value:</label>
                    <input type="number" step="0.01" name="retailer_value" id="retailer_value" required
                        class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-500 text-white font-medium px-4 py-2 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </form>
        </div>

         <!-- Logout Modal -->
    <div id="logout-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg w-full sm:w-1/3">
            <h3 class="text-xl font-bold mb-4">Are you sure you want to log out?</h3>
            <div class="flex justify-between">
                <button id="logout-cancel" class="px-4 py-2 bg-gray-300 text-black rounded-lg">Cancel</button>
                <button id="logout-confirm" class="px-4 py-2 bg-red-500 text-white rounded-lg">Log Out</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('logout-button').addEventListener('click', () => {
                document.getElementById('logout-modal').classList.remove('hidden');
            });
            document.getElementById('logout-cancel').addEventListener('click', () => {
                document.getElementById('logout-modal').classList.add('hidden');
            });
            document.getElementById('logout-confirm').addEventListener('click', () => {
                axios.post('/admin/logout')
                    .then(() => window.location.href = '/admin/login')
                    .catch(error => alert('Logout failed. Please try again.'));
            });
    </script>
</body>
</html>
