<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Group') }}
        </h2>
    </x-slot>


    <div class="container mx-auto">

    <form method="POST" action="{{ route('groups.update', $group->id) }}">
        @csrf
        @method('PUT')
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$group->name" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="permissions" :value="__('Permissions')" />
            <x-textarea id="permissions" class="block mt-1 w-full" name="permissions">{{ $group->permissions }}</x-textarea>
            <x-input-error :messages="$errors->get('permissions')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Update') }}
            </x-primary-button>
            <a href="{{ route('groups.index') }}" class="ml-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Cancel</a>
        </div>
    </form>
</div>

    
</x-app-layout>