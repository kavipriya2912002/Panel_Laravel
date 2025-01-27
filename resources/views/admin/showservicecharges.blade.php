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
        <h2 class="text-2xl font-bold mb-4">Service Charges</h2>

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
                @foreach ($commission as $comm)
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
                            <button onclick="location.href='{{ route('showservicecharge.edit', $comm->id) }}'"
                                class="text-blue-500 hover:text-blue-700">
                                Edit
                            </button>

                            <form action="{{ route('servicecharge.destroy', $comm->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this commission?');">
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

    @if (isset($servicecharge))
    <div class="container mx-auto mt-8">
        <form action="{{ route('showservicecharge.update', $servicecharge->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="user_id" class="block text-gray-700 font-medium mb-1">User ID:</label>
                    <select name="user_id" id="user_id" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ $servicecharge->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} (ID: {{ $user->id }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="service_id" class="block text-gray-700 font-medium mb-1">Service ID:</label>
                    <select name="service_id" id="service_id" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @foreach ($services as $service)
                            <option value="{{ $service->service_id }}"
                                {{ $servicecharge->service_id == $service->service_id ? 'selected' : '' }}>
                                {{ $service->service_type }} (ID: {{ $service->id }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="service_provider_id" class="block text-gray-700 font-medium mb-1">Service Provider
                        ID:</label>
                    <select name="service_provider_id" id="service_provider_id" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @foreach ($serviceProviders as $provider)
                            <option value="{{ $provider->id }}"
                                {{ $servicecharge->service_provider_id == $provider->id ? 'selected' : '' }}>
                                {{ $provider->name }} (ID: {{ $provider->id }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="range_from" class="block text-gray-700 font-medium mb-1">Range From:</label>
                    <input type="number" step="0.01" name="range_from" id="range_from"
                        value="{{ $servicecharge->range_from }}" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="range_to" class="block text-gray-700 font-medium mb-1">Range To:</label>
                    <input type="number" step="0.01" name="range_to" id="range_to"
                        value="{{ $servicecharge->range_to }}" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="company_type" class="block text-gray-700 font-medium mb-1">Company Type:</label>
                    <select name="company_type" id="company_type"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="flat" {{ $servicecharge->company_type == 'flat' ? 'selected' : '' }}>Flat
                        </option>
                        <option value="percentage" {{ $servicecharge->company_type == 'percentage' ? 'selected' : '' }}>
                            Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="company_value" class="block text-gray-700 font-medium mb-1">Company Value:</label>
                    <input type="number" step="0.01" name="company_value" id="company_value"
                        value="{{ $servicecharge->company_value }}" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="distributor_type" class="block text-gray-700 font-medium mb-1">Distributor
                        Type:</label>
                    <select name="distributor_type" id="distributor_type"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="flat" {{ $servicecharge->distributor_type == 'flat' ? 'selected' : '' }}>Flat
                        </option>
                        <option value="percentage"
                            {{ $servicecharge->distributor_type == 'percentage' ? 'selected' : '' }}>Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="distributor_value" class="block text-gray-700 font-medium mb-1">Distributor
                        Value:</label>
                    <input type="number" step="0.01" name="distributor_value" id="distributor_value"
                        value="{{ $servicecharge->distributor_value }}" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label for="retailer_type" class="block text-gray-700 font-medium mb-1">Retailer Type:</label>
                    <select name="retailer_type" id="retailer_type"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        <option value="flat" {{ $servicecharge->retailer_type == 'flat' ? 'selected' : '' }}>Flat
                        </option>
                        <option value="percentage" {{ $servicecharge->retailer_type == 'percentage' ? 'selected' : '' }}>
                            Percentage</option>
                    </select>
                </div>
                <div>
                    <label for="retailer_value" class="block text-gray-700 font-medium mb-1">Retailer
                        Value:</label>
                    <input type="number" step="0.01" name="retailer_value" id="retailer_value"
                        value="{{ $servicecharge->retailer_value }}" required
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>

            <button type="submit" class="px-6 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-sm hover:bg-blue-600 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                Update
            </button>
        </form>
    </div>
    @endif
</body>

</html>
