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
                {{ __('Group Management') }}
            </h2>
            <div>
                <a href="{{ route('groups.create') }}" class="btn btn-primary ml-3">Create New</a>
                
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back</a>
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


    <table class="w-full max-w-full table-auto border divide-y divide-gray-200">
        <thead>
            <tr>
                <th scope="col" style="width: 25%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" style="width: 25%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider"># of Users</th>
                <th scope="col" style="width: 25%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">Created At</th>
                <th scope="col" style="width: 25%;" class="px-6 py-3 bg-gray-50 text-center font-bold text-s text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
            <tr>
                <td class="px-6 py-1 whitespace-nowrap border text-center">
                    <a href="{{ route('groups.users', $group->id) }}" class="text-blue-600" style="color:#3c8dbc">{{ $group->name }}</a>
                </td>
                <td class="px-6 py-1 whitespace-nowrap border text-center">{{ $group->users_count }}</td>
                <td class="px-6 py-1 whitespace-nowrap border text-center">{{ $group->created_at->format('Y-m-d h:i A') }}</td>
    <td class="px-6 py-1 whitespace-nowrap border text-center">
                    <div class="flex justify-center items-center space-x-2">
                        <a href="{{ route('groups.edit', $group->id) }}" class="btn btn-primary btn-sm edit-Credit"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('groups.destroy', $group->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete(event)">
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