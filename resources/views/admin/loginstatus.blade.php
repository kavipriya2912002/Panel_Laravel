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

    <!-- Centered content in the same row -->
    <div class="container mx-auto px-4 py-6">
        <div id="login-status" class="w-full lg:w-3/4 mx-auto">
            <h3 class="text-lg font-bold mb-4 text-center">Login Requests</h3>
            @if (session('status'))
                <div class="bg-green-500 text-white p-2 rounded mb-4">
                    {{ session('status') }}
                </div>
            @endif
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">User</th>
                        <th class="border border-gray-300 px-4 py-2">Requested At</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $request->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                {{ $request->created_at->format('d M Y, h:i A') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form method="POST" action="{{ route('admin.updateStatus', $request->id) }}"
                                    class="inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="allow">
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white"
                                        onclick="showAlert('User {{ $request->user->name }} is allowed to login.')">Allow</button>
                                </form>

                                <form method="POST" action="{{ route('admin.updateStatus', $request->id) }}"
                                    class="inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white">Reject</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
        function showAlert(message) {
            alert(message);
        }

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
