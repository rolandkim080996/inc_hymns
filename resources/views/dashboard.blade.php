<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <h3 class="text-lg font-semibold mb-4">Overview</h3>

        <div class="flex gap-4">
    <!-- Total Church Hymns -->
    @foreach($totalChurchHymns as $hymn)
    <div class="flex-1 bg-blue-100 p-6 rounded-lg border border-blue-400 flex flex-col justify-center items-center">
        @php
            $serviceName = '';
            switch($hymn->name) {
                case 'AWS':
                    $serviceName = 'Adult Worship Service';
                    break;
                case 'CWS':
                    $serviceName = 'Children Worship Service';
                    break;
                case 'EM':
                    $serviceName = 'Evanglical Mission';
                    break;
                case 'Wedding':
                    $serviceName = 'Wedding';
                break;
            }
        @endphp
        <h4 class="text-lg font-semibold text-blue-600 text-center">{{ $serviceName }} Hymns</h4>
        <p class="text-5xl font-bold text-center">{{ $hymn->musics_count }}</p>
    </div>
@endforeach

</div>


<div class="mt-8 text-center">
    <h3 class="text-lg font-semibold mb-4 mt-6">Quick Links</h3>
    <ul class="space-y-4">
     
        <li class="border border-gray-200 rounded-md hover:bg-gray-100 transition duration-300">
            <a href="{{ route('categories.index') }}" class="block py-2 px-4 text-green-600 hover:underline">Manage Categories</a>
        </li>
        <li class="border border-gray-200 rounded-md hover:bg-gray-100 transition duration-300">
            <a href="{{ route('instrumentations.index') }}" class="block py-2 px-4 text-yellow-600 hover:underline">Manage Instrumentations</a>
        </li>
        <li class="border border-gray-200 rounded-md hover:bg-gray-100 transition duration-300">
            <a href="{{ route('ensemble_types.index') }}" class="block py-2 px-4 text-purple-600 hover:underline">Manage Ensemble Types</a>
        </li>
      
        <li class="border border-gray-200 rounded-md hover:bg-gray-100 transition duration-300">
            <a href="{{ route('musics.index') }}" class="block py-2 px-4 text-red-600 hover:underline">View All Hymns</a>
        </li>
    </ul>
</div>


    </div>
</div>

        </div>
    </div>
</x-app-layout>
