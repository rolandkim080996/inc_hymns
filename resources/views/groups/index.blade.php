<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Groups Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('register') }}" class="btn btn-success">
                            Add User
                        </a>
                    </div>

                    <table class="w-full max-w-full table-auto border divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"># of Users</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                            <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($groups as $group)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $group->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $group->users->count() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $group->created_at->format('M d, Y') }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <a  href="{{ route('groups.edit', $group->id) }}" class="btn btn-primary btn-sm edit-Credit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" style="margin-top:16px;margin-left:5px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">{{ $user->name }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">{{ $user->username }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">{{ $user->email }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm edit-Credit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" style="margin-top:16px;margin-left:5px;">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <script>
                    function confirmDelete(event) {
                        event.preventDefault(); // Prevent the form from submitting immediately
                        if (confirm('Are you sure you want to delete this group?')) {
                            event.target.submit(); // Submit the form if the user confirms
                        }
                    }
                </script>

                </div>
            </div>
        </div>
    </div>

    </x-app-layout>