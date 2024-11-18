<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <div class="w-1/4 bg-gray-800 text-white p-4">
            <ul>
                <li class="mb-4">
                    <button onclick="showSection('user-list')" class="w-full text-center">User List</button>
                </li>
                <li>
                    <button onclick="showSection('login-status')" class="w-full text-center">Login Status</button>
                </li>
            </ul>
        </div>
        <div id="user-list" class="w-3/4 p-6">
            <div id="userList" class="content-section">
                <h3 class="text-lg font-bold mb-4">List of Registered Users</h3>
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Name</th>
                            <th class="border border-gray-300 px-4 py-2">Email</th>
                            <th class="border border-gray-300 px-4 py-2">Registered At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $user->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="login-status" class="w-3/4 p-6 hidden">
            <h3 class="text-lg font-bold mb-4">Login Requests</h3>
            <table class="min-w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">User</th>
                        <th class="border border-gray-300 px-4 py-2">Requested At</th>
                        <th class="border border-gray-300 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $request->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $request->created_at->format('d M Y, h:i A') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <form method="POST" action="{{ route('admin.updateStatus', $request->id) }}" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="action" value="allow">
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white">Allow</button>
                                </form>
                                
                                
                                <form method="POST" action="{{ route('admin.updateStatus', $request->id) }}" class="inline-block">
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

    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>

    <script>
        function showSection(section) {
            document.getElementById('user-list').classList.add('hidden');
            document.getElementById('login-status').classList.add('hidden');
            document.getElementById(section).classList.remove('hidden');
        }
    </script>
</x-app-layout>
