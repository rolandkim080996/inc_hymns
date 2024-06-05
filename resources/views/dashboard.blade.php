<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery before Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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

                <div class="flex gap-4">
    <!-- Total Church Hymns -->
    @php
        $colors = ['0A6847', 'F6F5F2', 'C40C0C', 'FFBB70'];
        $colorText = ['EEEEEE', '32012F', 'EEEEEE', 'EEEEEE'];
        $colorIndex = 0;
    @endphp

    @foreach($totalChurchHymns as $hymn)
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
            $currentTextColor = $colorText[$colorIndex];
           
            @endphp
        <a href="{{ route('musics.index', ['church_hymn_id' => $hymn->id]) }}" class="flex-1 p-6 rounded-lg border flex flex-col justify-center items-center mb-4" style="background-color: #{{ $colors[$colorIndex] }}; border: 2px solid #686D76; text-decoration: none;">
            <span class="font-bold text-center mb-2" style="color: #{{ $currentTextColor }}; font-size: 45px;">{{ $hymn->musics_count }}</span>
            <h4 class="font-semibold text-center" style="color: #{{ $currentTextColor }}; font-size: 15px;">{{ $serviceName }}</h4>
        </a>
        @php
        $colorIndex = ($colorIndex+ 1) % count($colors);
        @endphp
    @endforeach

    <!-- Hymns of Music Count -->
    <a href="{{ route('musics.index') }}" class="flex-1 p-6 rounded-lg border flex flex-col justify-center items-center mb-4" style="background-color: #03AED2; border: 2px solid #686D76; text-decoration: none;">
        <span class="font-bold text-center mb-2" style="color:#EEF7FF; font-size: 45px;">{{ $totalChurchHymns->sum('musics_count') }}</span>
        <h4 class="font-semibold text-center" style="color:#EEF7FF; font-size: 15px;">Hymns</h4>
    </a>

    <!-- Users Count -->
    <a href="{{ route('users.index') }}" class="flex-1 p-6 rounded-lg border flex flex-col justify-center items-center mb-4" style="background-color: #121481; border: 2px solid #686D76; text-decoration: none;">
        <span class="font-bold text-center mb-2" style="color:#EEF7FF; font-size: 45px;">{{ $totalUsers }}</span>
        <h4 class="font-semibold text-center" style="color:#EEF7FF; font-size: 15px;">Users</h4>
    </a>
</div>



                    <div class="flex mt-8 gap-4 mt-4">
                        <!-- Recent Activity -->
                        <div class="w-full md:w-1/2">
                            <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 border-b border-gray-300">Date</th>
                                            <th class="py-2 px-4 border-b border-gray-300">Admin</th>
                                            <th class="py-2 px-4 border-b border-gray-300">Action</th>
                                            <th class="py-2 px-4 border-b border-gray-300">Item</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($totalChurchHymns as $activity)
                                            <tr>
                                                <td class="py-2 px-4 border-b border-gray-300">-</td>
                                                <td class="py-2 px-4 border-b border-gray-300">-</td>
                                                <td class="py-2 px-4 border-b border-gray-300">-</td>
                                                <td class="py-2 px-4 border-b border-gray-300">-</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
             <!-- Hymns Chart -->
<div class="w-full md:w-1/2">
    <h3 class="text-lg font-semibold mb-4">Hymns Chart</h3>
    <div style="position: relative; height: 200px; width: 400px;">
        <canvas id="churchHymnsChart" style="position: absolute; left: 5; top: 0; bottom: 0; right: 0; width: 100%; height: 100%;"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Extract labels and data from PHP variables
    var labels = [];
    var data = [];
    var hymnCounts = []; // Array to hold hymn counts for tooltips

    @foreach($totalChurchHymns as $hymn)
        labels.push('{{ $hymn->name }}');
        data.push({{ $hymn->musics_count }});
        hymnCounts.push('{{ $hymn->musics_count }}');
    @endforeach

    // Create the chart only if both labels and data arrays are not empty
    if (labels.length > 0 && data.length > 0) {
        // Get the context of the canvas element
        var ctx = document.getElementById('churchHymnsChart').getContext('2d');

        // Define the dataset for the chart
        var dataset = {
            labels: labels,
            datasets: [{
                label: 'Church Hymns',
                data: data,
                backgroundColor: [
                    'rgba(10, 104, 71, 0.2)',
                    'rgba(246, 245, 242, 0.2)',
                    'rgba(196, 12, 12, 0.2)',
                    'rgba(255, 187, 112, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(10, 104, 71, 1)',
                    'rgba(246, 245, 242, 1)',
                    'rgba(196, 12, 12, 1)',
                    'rgba(255, 187, 112, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Define the chart options
        var options = {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var label = data.labels[tooltipItem.index];
                        var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        return label + ': ' + value + ' Hymns';
                    }
                }
            },
            legend: {
                display: true,
                position: 'right',
            }
        };

        // Create the chart
        var churchHymnsChart = new Chart(ctx, {
            type: 'pie',
            data: dataset,
            options: options
        });
    }
</script>



                    </div>

                    <div class="flex mt-8 gap-4 mt-6 mb-6">
                        <!-- Hymn Categories -->
                        <div class="w-full md:w-1/2">
                            <h3 class="text-lg font-semibold mb-4">Hymn Categories</h3>
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 border-b border-gray-300">#</th>
                                            <th class="py-2 px-4 border-b border-gray-300">Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                            <td style="width: 5%;" class="py-2 px-4 border-b border-gray-300">{{ $loop->iteration }}</td>
                                
                                                <td class="py-2 px-4 border-b border-gray-300">{{ $category->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- View All Button -->
                                <div class="text-center mt-4">
                                    <a href="{{ route('categories.index') }}" class="btn btn-success">View All</a>
                                </div>
                            </div>

                        </div>

                        <!-- Instrumentations -->
                        <div class="w-full md:w-1/2">
                            <h3 class="text-lg font-semibold mb-4">Instrumentations</h3>
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 border-b border-gray-300">#</th>
                                            <th class="py-2 px-4 border-b border-gray-300">Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($instrumentations as $instrumentation)
                                            <tr>
                                            <td style="width: 5%;" class="py-2 px-4 border-b border-gray-300">{{ $loop->iteration }}</td>
                                                <td class="py-2 px-4 border-b border-gray-300">{{ $instrumentation->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- View All Button -->
                                <div class="text-center mt-4">
                                    <a href="{{ route('instrumentations.index') }}" class="btn btn-success">View All</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="flex mt-8 gap-4">
                        <!-- Ensemble Types -->
                        <div class="w-full md:w-1/2">
                            <h3 class="text-lg font-semibold mb-4">Ensemble Types</h3>
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 border-b border-gray-300">#</th>
                                            <th class="py-2 px-4 border-b border-gray-300">Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ensembleTypes as $ensembleType)
                                            <tr>
                                                <td style="width: 5%;" class="py-2 px-4 border-b border-gray-300">{{ $loop->iteration }}</td>
                                                <td class="py-2 px-4 border-b border-gray-300">{{ $ensembleType->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- View All Button -->
                                <div class="text-center mt-4">
                                    <a href="{{ route('ensemble_types.index') }}" class="btn btn-success">View All</a>
                                </div>
                            </div>

                        </div>

                        <!-- Credits -->
                        <div class="w-full md:w-1/2">
                            <h3 class="text-lg font-semibold mb-4">Credits</h3>
                            <div class="bg-gray-100 p-4 rounded-lg shadow">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 border-b border-gray-300">#</th>
                                            <th class="py-2 px-4 border-b border-gray-300">Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($credits as $credit)
                                            <tr>
                                                <td style="width: 5%;" class="py-2 px-4 border-b border-gray-300">{{ $loop->iteration }}</td>
                                                <td class="py-2 px-4 border-b border-gray-300">{{ $credit->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- View All Button -->
                                <div class="text-center mt-4">
                                    <a href="{{ route('credits.index') }}" class="btn btn-success">View All</a>
                                </div>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
