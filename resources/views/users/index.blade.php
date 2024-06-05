<!-- music_management/categories.blade.php -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery before Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center my-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !empty($group->name) ? $group->name : 'Current' }} Users
        </h2>

            <div>
                <a href="{{ route('groups.create') }}" class="btn btn-primary ml-3">Create New</a>
                
                <a href="{{ route('groups.index') }}" class="btn btn-secondary">
                                {{ __('Cancel') }}
                            </a>
            </div>
        </div>
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
                        <a href="{{ route('users.create') }}" class="btn btn-success">
                            Add User
                        </a>
                    </div>

                    <table class="w-full max-w-full table-auto border divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 5%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" style="width: 25%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" style="width: 25%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">Email</th>
                            <th scope="col" style="width: 25%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">Username</th>
                            <th scope="col" style="width: 25%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">Group</th>
                            <th scope="col" style="width: 15%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr>
                                <td style="width: 5%;" class="px-6 py-1 whitespace-nowrap border text-center">{{ $loop->iteration }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">{{ $user->name }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">{{ $user->email }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">{{ $user->username }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border text-center">
                                    @if($user->groups->isEmpty())
                                        Current
                                    @else
                                        @foreach($user->groups as $group)
                                            {{ $group->name }}
                                            @if(!$loop->last), @endif
                                        @endforeach
                                    @endif
                                </td>
                                
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
                        if (confirm('Are you sure you want to delete this user?')) {
                            event.target.submit(); // Submit the form if the user confirms
                        }
                    }
                </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>