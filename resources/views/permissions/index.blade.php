<!-- resources/views/permissions/index.blade.php -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery before Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <div class="flex justify-between items-center my-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permission Management') }}
            </h2>
            <div>
                <a href="{{ route('permissions.create') }}" class="btn btn-primary ml-3"><i class="fas fa-plus"></i> Permission</a>
                
                <a href="{{ route('admin.settings') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($categories->isNotEmpty())
                        @foreach ($categories as $category)
                            @if ($category->permissions->isNotEmpty())
                                <h3 class="font-semibold text-lg mt-4">{{ $category->name }}</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Description') }}</th>
                                                <th>{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category->permissions as $permission)
                                                <tr>
                                                    <td>{{ $permission->name }}</td>
                                                    <td>{{ $permission->description }}</td>
                                                    <td>
                                                        <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-secondary"> <i class="fas fa-edit"></i></a>
                                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p>{{ __('No permissions found.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


