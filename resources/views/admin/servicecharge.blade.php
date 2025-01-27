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

    <div id="service-charge-form" class=" mx-auto max-w-2xl bg-white p-6 rounded-lg shadow-lg mt-10">
        <h1 class="text-2xl font-bold text-center my-4">Set Service Charge</h1>
        @if (session('success'))
            <p class="text-green-600 text-center font-semibold mb-4">{{ session('success') }}</p>
        @endif
    
        <form action="{{ route('service_charge.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="user_id" class="block text-gray-700 font-medium mb-1">User ID:</label>
                    <select name="user_id" id="user_id" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="" disabled selected>Select User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} (ID: {{ $user->id }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="service_id" class="block text-gray-700 font-medium mb-1">Service ID:</label>
                    <select name="service_id" id="service_id" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="" disabled selected>Select Service</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->service_id }}">{{ $service->service_type }} (ID: {{ $service->id }})</option>
                        @endforeach
                    </select>
                </div>
                
                
                <div>
                    <label for="service_provider_id" class="block text-gray-700 font-medium mb-1">Service Provider ID:</label>
                    <select name="service_provider_id" id="service_provider_id" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="" disabled selected>Select Service_Provider</option>
                        @foreach ($serviceProviders as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }} (ID: {{ $provider->id }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="range_from" class="block text-gray-700 font-medium mb-1">Range From:</label>
                    <input type="number" step="0.01" name="range_from" id="range_from" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="range_to" class="block text-gray-700 font-medium mb-1">Range To:</label>
                    <input type="number" step="0.01" name="range_to" id="range_to" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="company_type" class="block text-gray-700 font-medium mb-1">Company Type:</label>
                    <select name="company_type" id="company_type"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="flat">Flat</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="company_value" class="block text-gray-700 font-medium mb-1">Company Value:</label>
                    <input type="number" step="0.01" name="company_value" id="company_value" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="distributor_type" class="block text-gray-700 font-medium mb-1">Distributor Type:</label>
                    <select name="distributor_type" id="distributor_type"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="flat">Flat</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="distributor_value" class="block text-gray-700 font-medium mb-1">Distributor Value:</label>
                    <input type="number" step="0.01" name="distributor_value" id="distributor_value" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="retailer_type" class="block text-gray-700 font-medium mb-1">Retailer Type:</label>
                    <select name="retailer_type" id="retailer_type"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="flat">Flat</option>
                        <option value="percentage">Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="retailer_value" class="block text-gray-700 font-medium mb-1">Retailer Value:</label>
                    <input type="number" step="0.01" name="retailer_value" id="retailer_value" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="w-full bg-black text-white font-medium py-2 rounded-md hover:bg-gray-100 hover:text-black focus:outline-black focus:ring-2 focus:bg-gray-600 focus:ring-offset-2">
                    Submit
                </button>
            </div>
        </form>
    </div>

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