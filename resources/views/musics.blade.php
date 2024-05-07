<!-- resources/views/musics.blade.php -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery before Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music Listsss') }}
        </h2>
    </x-slot>

    <div class="py-12">
      
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <!-- Add Music Button with Icon -->
    <button id="addMusicButton" class="btn btn-success mb-2">
        <i class="fas fa-plus"></i>
        <span> Music</span>
    </button>

    <script>
        // Add event listener to the addMusicButton
        document.getElementById('addMusicButton').addEventListener('click', function() {
            // Redirect to the music.create route (adjust the URL as needed)
            window.location.href = '{{ route("musics.create") }}';
        });
    </script>

    <!-- Dark overlay -->
    <div id="overlay" class="fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50 z-50 hidden"></div>

        <!-- Search Input and Tabs -->
        <div class="flex items-center justify-between mb-4">
                <!-- Search Input -->
                <div class="flex-grow relative">
                    <input type="text" id="searchInput" class="border border-gray-300 rounded px-4 py-2 w-full" placeholder="Search music...">
                    <div id="searchOverlay" class="absolute inset-0 bg-gray-900 bg-opacity-50 z-10 hidden"></div>
                </div>

                <!-- Tabs -->
                <div class="flex">
                    <button id="tabAll" class="tab-button bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-l focus:outline-none">All</button>
                    <button id="tabSongs" class="tab-button bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 focus:outline-none">Hymns</button>
                    <button id="tabPlaylist" class="tab-button bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-r focus:outline-none">Playlist</button>
                </div>
        </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
            
                    <!-- Music Table -->
                    <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Language</th>
                            </tr>
                        </thead>
                        <tbody id="musicList" class="bg-white divide-y divide-gray-200">
                            @foreach($musics as $index => $music)
                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-200">
                                <td class="px-6 py-4 whitespace-nowrap border text-center">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap border text-center">
                                    <a href="{{ route('musics.show', $music->id) }}" class="flex items-center">
                                        <i class="fas fa-music" style="margin-right: 12px; margin-left: 4px;"></i>
                                        {{ $music->title }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border text-center">
                                    @foreach($music->categories as $category)
                                        {{ $loop->first ? '' : ', ' }}{{ $category->name }}
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border text-center">
                                    <div class="flex justify-between items-center">
                                        <div>{{ $music->language->name }}</div>
                                        <div class="ml-1">
                                            <button id="context-menu-trigger-{{ $music->id }}" class="context-menu-trigger focus:outline-none text-lg">
                                                <span>- - -</span>
                                            </button>
                                            <div id="context-menu-{{ $music->id }}" class="context-menu hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-10">
                                                <ul class="py-1">
                                                    <li>
                                                        <a href="{{ route('musics.edit', $music->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form method="POST" action="{{ route('musics.destroy', $music->id) }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none" onclick="return confirm('Are you sure you want to delete this music?');">Delete</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a href="#" id="view-credits-{{ $music->id }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View Credits</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div id="credits-menu-{{ $music->id }}" class="credits-menu hidden fixed inset-0  items-center justify-center z-50">
                                                <div class="bg-white rounded-lg shadow-lg p-4">
                                                    <h2 class="text-lg font-semibold mb-3">Credits</h2>
                                                    <ul class="text-sm">
                                                        <li><strong>Lyricist:</strong> {{ $music->lyricist }}</li>
                                                        <li><strong>Composer:</strong> {{ $music->composer }}</li>
                                                        <li><strong>Arranger:</strong> {{ $music->arranger }}</li>
                                                    </ul>
                                                    <button id="close-credits-{{ $music->id }}" class="block mt-4 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 focus:outline-none">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <style>
                                    .credits-menu {
                                        /* Center the menu using fixed positioning */
                                        position: fixed;
                                        top: 0;
                                        left: 0;
                                        right: 0;
                                        bottom: 0;
                                        display: none;
                                        justify-content: center;
                                        align-items: center;
                                        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
                                    }

                                    .credits-menu .bg-white {
                                        width: 300px; /* Adjust the width as needed */
                                    }
                                </style>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const viewCreditsBtn = document.getElementById(`view-credits-{{ $music->id }}`);
                                        const creditsMenu = document.getElementById(`credits-menu-{{ $music->id }}`);
                                        const closeCreditsBtn = document.getElementById(`close-credits-{{ $music->id }}`);

                                        if (viewCreditsBtn && creditsMenu && closeCreditsBtn) {
                                            viewCreditsBtn.addEventListener('click', function(e) {
                                                e.preventDefault();
                                                creditsMenu.classList.add('hidden');
                                            });

                                            closeCreditsBtn.addEventListener('click', function(e) {
                                                e.preventDefault();
                                                creditsMenu.classList.add('hidden');
                                            });
                                        }
                                    });
                                </script>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <!-- Message when no music is found -->
                    <p id="noMusicFoundMessage" class="text-center text-gray-500 mt-4" style="display: none;">No music found</p>
                </div>
            </div>
            <style>
                /* Ensure table fills its container */
                table {
                    width: 100%;
                }

                /* Set minimum width to prevent shrinking */
                .min-w-full {
                    min-width: 100%;
                }

                /* Allow horizontal scrolling on overflow */
                .overflow-x-auto {
                    overflow-x: auto;
                }

                /* Style for active tab */
                .tab-button.active {
                    background-color: #3182ce;
                    color: white;
                }
                    /* Hover effect for table rows */
                tbody tr:hover {
                    background-color: #f3f4f6; /* Light gray background on hover */
                }
            </style>
            <script>
                // Add event listener for search input
                document.getElementById('searchInput').addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase();
                    const musicRows = document.querySelectorAll('#musicList tr');
                    let noMusicFound = true;

                    musicRows.forEach(row => {
                        const title = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                        const category = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                        const language = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                        const isVisible = title.includes(searchTerm) || category.includes(searchTerm) || language.includes(searchTerm);

                        row.style.display = isVisible ? '' : 'none';

                        if (isVisible) {
                            noMusicFound = false;
                        }
                    });

                    // Show/hide no music found message
                    const noMusicFoundMessage = document.getElementById('noMusicFoundMessage');
                    noMusicFoundMessage.style.display = noMusicFound ? 'block' : 'none';
                });
            </script>
            <script>
                // JavaScript for tab switching
                const tabButtons = document.querySelectorAll('.tab-button');
                const musicRows = document.querySelectorAll('#musicList tr');
                const searchInput = document.getElementById('searchInput');
                const searchOverlay = document.getElementById('searchOverlay');

                // Add event listener for search input focus
                searchInput.addEventListener('focus', () => {
                    searchOverlay.classList.remove('hidden');
                });

                // Add event listener for search input blur
                searchInput.addEventListener('blur', () => {
                    searchOverlay.classList.add('hidden');
                });

                tabButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        // Set active class on clicked tab button
                        tabButtons.forEach(btn => btn.classList.remove('active'));
                        button.classList.add('active');

                        // Show/hide rows based on selected tab
                        const tabName = button.id.slice(3).toLowerCase(); // Extract tab name (e.g., 'All', 'Songs', 'Playlist')
                        musicRows.forEach(row => {
                            const category = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                            const isSongRow = tabName === 'songs' && category !== 'playlist';
                            const isPlaylistRow = tabName === 'playlist' && category === 'playlist';
                            const isVisible = tabName === 'all' || isSongRow || isPlaylistRow;

                            row.style.display = isVisible ? '' : 'none';
                        });

                        // Show/hide no music found message
                        const noMusicFoundMessage = document.getElementById('noMusicFoundMessage');
                        const visibleRows = document.querySelectorAll('#musicList tr[style=""]');
                        noMusicFoundMessage.style.display = visibleRows.length > 0 ? 'none' : 'block';
                    });
                });
            </script>

</div>
            </div>
</x-app-layout>
            <style>
                .context-menu {
                    /* Adjust positioning to match trigger button */
                    top: 100%;
                    left: 0;
                    transform: translateX(-50%);
                }
            </style>

            <script>
                // JavaScript for context menu functionality
                document.addEventListener('DOMContentLoaded', () => {
                    const menuTriggers = document.querySelectorAll('.context-menu-trigger');

                    menuTriggers.forEach(trigger => {
                        const contextMenu = trigger.nextElementSibling;

                        // Show context menu on trigger click
                        trigger.addEventListener('click', (e) => {
                            e.preventDefault();
                            hideAllContextMenus();
                            contextMenu.classList.toggle('hidden');
                        });

                        // Hide context menu on document click outside
                        document.addEventListener('click', (e) => {
                            if (!contextMenu.contains(e.target) && !trigger.contains(e.target)) {
                                contextMenu.classList.add('hidden');
                            }
                        });

                        // Position context menu based on trigger button
                        const rect = trigger.getBoundingClientRect();
                        const menuRect = contextMenu.getBoundingClientRect();
                        const offsetX = rect.left + (rect.width / 2) - (menuRect.width / 2);
                        const offsetY = rect.top + rect.height;
                        contextMenu.style.left = `${offsetX}px`;
                        contextMenu.style.top = `${offsetY}px`;
                    });

                    // Hide all context menus
                    function hideAllContextMenus() {
                        document.querySelectorAll('.context-menu').forEach(menu => {
                            menu.classList.add('hidden');
                        });
                    }
                });
            </script>