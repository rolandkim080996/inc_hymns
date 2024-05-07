<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music Details') }}
        </h2>
    </x-slot>

    <div class="py-10 mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                


<div class="music-container">
<!-- Display Music Details -->
<div class="music-details">

<div class="music-player">
        <!-- Tab buttons -->
        <div class="tab-buttons">
            <button class="tab-button-mp3" data-path="{{ asset('storage/' . $music->vocals_mp3_path) }}">Vocals</button>
            <button class="tab-button-mp3" data-path="{{ asset('storage/' . $music->organ_mp3_path) }}">Organ</button>
            <button class="tab-button-mp3" data-path="{{ asset('storage/' . $music->preludes_mp3_path) }}">Preludes</button>
        </div>

        <!-- Audio player -->
        <audio id="musicPlayer" controls class="w-64" preload="auto">
            Your browser does not support the audio element.
            <!-- Include source elements -->
            <source id="audioSource" src="#" type="audio/mpeg">
        </audio>

        <!-- Playback control buttons -->
        <div class="flex mt-2">
            <button onclick="rewindAudio()" class="custom-btn mr-4">
                <i class="fas fa-backward"></i>
            </button>
            <button onclick="fastForwardAudio()" class="custom-btn ml-4">
                <i class="fas fa-forward"></i>
            </button>
        </div>
    </div>

    <!-- JavaScript to handle dropdown and audio playback -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const musicPlayer = document.getElementById('musicPlayer');

            // Handle click events for tab buttons
            const tabButtons = document.querySelectorAll('.tab-button-mp3');
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const path = button.getAttribute('data-path');
                    switchTrack(path);
                });
            });
        });
// Get the audio element
const musicPlayer = document.getElementById('musicPlayer');
function seekAudio(event) {
    console.log('Click event detected on progress bar.');
    console.log('Offset X:', event.offsetX);

    const clickX = event.offsetX;
    const width = this.offsetWidth;
    const audioDuration = musicPlayer.duration;
    const seekTime = (clickX / width) * audioDuration;

    console.log('Width:', width);
    console.log('Audio Duration:', audioDuration);
    console.log('Seek Time:', seekTime);

    musicPlayer.currentTime = seekTime;
}

// Attach seek event listener to the audio progress bar
musicPlayer.addEventListener('click', seekAudio);


        // Function to switch audio source and maintain playback position
        function switchTrack(path) {
            const audioSource = document.getElementById('audioSource');
            const musicPlayer = document.getElementById('musicPlayer');
            const currentTime = musicPlayer.currentTime;

            // Set new audio source path
            audioSource.src = path;

            // Load and play the new audio source
            musicPlayer.load();
            musicPlayer.play();

            // Restore playback position if available
            musicPlayer.addEventListener('loadedmetadata', function() {
                //alert(currentTime);
                musicPlayer.currentTime = currentTime;
            });
        }

        // Function to rewind audio by 10 seconds
        function rewindAudio() {
            const musicPlayer = document.getElementById('musicPlayer');
            musicPlayer.currentTime -= 10; // Rewind by 10 seconds
        }

        // Function to fast forward audio by 10 seconds
        function fastForwardAudio() {
            const musicPlayer = document.getElementById('musicPlayer');
            musicPlayer.currentTime += 10; // Fast forward by 10 seconds
        }
    </script>

    <!-- Title -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Title:</p>
        <p><i>{{ $music->title }}</i></p>
    </div>

    <!-- Song Number -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Hymn Number:</p>
        <p>{{ $music->song_number }}</p>
    </div>

    
    <!-- Categories -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Category:</p>
        <ul class="list-disc list-inside" id="categoriesList">
            <?php
                $categories = $music->categories->take(3); // Limit to the first three items
                foreach($categories as $category) {
                    echo "<li>{$category->name}</li>";
                }
            ?>
            <?php foreach($music->categories->skip(3) as $category): ?>
                <li class="hidden"><?php echo $category->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php if (count($music->categories) > 3): ?>
            <button onclick="toggleList('categoriesList', this)">See More</button>
        <?php endif; ?>
    </div>

    <!-- Instrumentation -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Instrumentation:</p>
        <ul class="list-disc list-inside" id="instrumentationList">
            <?php
                $instrumentations = $music->instrumentations->take(3); // Limit to the first three items
                foreach($instrumentations as $instrumentation) {
                    echo "<li>{$instrumentation->name}</li>";
                }
            ?>
            <?php foreach($music->instrumentations->skip(3) as $instrumentation): ?>
                <li class="hidden"><?php echo $instrumentation->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php if (count($music->instrumentations) > 3): ?>
            <button onclick="toggleList('instrumentationList', this)">See More</button>
        <?php endif; ?>
    </div>

    <!-- Ensemble Type -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Ensemble Type:</p>
        <ul class="list-disc list-inside" id="ensembleTypeList">
            <?php
                $ensembleTypes = $music->ensembleTypes->take(3); // Limit to the first three items
                foreach($ensembleTypes as $ensembleType) {
                    echo "<li>{$ensembleType->name}</li>";
                }
            ?>
            <?php foreach($music->ensembleTypes->skip(3) as $ensembleType): ?>
                <li class="hidden"><?php echo $ensembleType->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php if (count($music->ensembleTypes) > 3): ?>
            <button onclick="toggleList('ensembleTypeList', this)">See More</button>
        <?php endif; ?>
    </div>

    <!-- Lyricists -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Lyricist:</p>
        <ul class="list-disc list-inside" id="lyricistsList">
            <?php
                $lyricists = $music->lyricists->take(3); // Limit to the first three items
                foreach($lyricists as $lyricist) {
                    echo "<li>{$lyricist->name}</li>";
                }
            ?>
            <?php foreach($music->lyricists->skip(3) as $lyricist): ?>
                <li class="hidden"><?php echo $lyricist->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php if (count($music->lyricists) > 3): ?>
            <button onclick="toggleList('lyricistsList', this)">See More</button>
        <?php endif; ?>
    </div>

    <!-- Composer -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Composer:</p>
        <ul class="list-disc list-inside" id="composerList">
            <?php
                $composers = $music->composers->take(3); // Limit to the first three items
                foreach($composers as $composer) {
                    echo "<li>{$composer->name}</li>";
                }
            ?>
            <?php foreach($music->composers->skip(3) as $composer): ?>
                <li class="hidden"><?php echo $composer->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php if (count($music->composers) > 3): ?>
            <button onclick="toggleList('composerList', this)">See More</button>
        <?php endif; ?>
    </div>

    <!-- Arranger -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Arranger:</p>
        <ul class="list-disc list-inside" id="arrangerList">
            <?php
                $arrangers = $music->arrangers->take(3); // Limit to the first three items
                foreach($arrangers as $arranger) {
                    echo "<li>{$arranger->name}</li>";
                }
            ?>
            <?php foreach($music->arrangers->skip(3) as $arranger): ?>
                <li class="hidden"><?php echo $arranger->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php if (count($music->arrangers) > 3): ?>
            <button onclick="toggleList('arrangerList', this)">See More</button>
        <?php endif; ?>
    </div>

    <script>
        function toggleList(listId, button) {
            const list = document.getElementById(listId);
            const items = list.querySelectorAll('li.hidden');

            if (list.classList.contains('expanded')) {
                list.classList.remove('expanded');
                items.forEach(item => {
                    item.style.display = 'none';
                });
                button.innerText = 'See More';
            } else {
                list.classList.add('expanded');
                items.forEach(item => {
                    item.style.display = 'list-item';
                });
                button.innerText = 'See Less';
            }
        }
    </script>

    <style>
        .list-inside {
            max-height: 90px; /* Set the max height to show 3 items by default */
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .list-inside.expanded {
            max-height: none; /* Allow full height when expanded */
        }

        li.hidden {
            display: none;
        }
    </style>

    <!-- Language -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Language:</p>
        <p>{{ $music->language->name }}</p>
    </div>

    <!-- Verses Used -->
    <div class="mb-4">
        <p class="font-semibold text-lg">Verses Used:</p>
        <p>{{ $music->verses_used }}</p>
    </div>

</div>


<!-- Music Score (Right Side) -->
<div class="music-score">

    <!-- Tab buttons -->
    <div class="tab-buttons">
        <button class="tab-button active" data-path="{{ asset('storage/' . $music->music_score_path) }}">Music Score</button>
        <button class="tab-button" data-path="{{ asset('storage/' . $music->lyrics_path) }}">Lyrics Only</button>
    </div>

    <!-- PDF or Lyrics Container -->
    <div class="pdf-container">
        <!-- Canvas for PDF rendering -->
        <canvas id="pdf-canvas" width="100%" height="600px"></canvas>
    </div>
</div>


</div>


<style>
    /* Custom CSS styles for music details section */
    .tab-buttons {
        display: flex;
        justify-content: start;
        margin-bottom: 20px;
    }

    .tab-button-mp3 {
        background-color: #f9f9f9; /* Green background */
        border: none;
        color: #2d2a2a;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .tab-button-mp3:hover {
        background-color: #e3dfdf; /* Darker green on hover */
    }

    .tab-button-mp3.active {
        background-color: #303639; /* Blue background for active tab */
        
        color: #f9f9f9;
    }


    .tab-button {
        background-color: #f9f9f9; /* Green background */
        border: none;
        color: #2d2a2a;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .tab-button:hover {
        background-color: #e3dfdf; /* Darker green on hover */
    }

    .tab-button.active {
        background-color: #303639; /* Blue background for active tab */
        
        color: #f9f9f9;
    }
    .music-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px; /* Adjust the gap between left and right sections */
}

.music-details {
    flex: 1; /* Expand to fill available space */
}
.music-score {
        display: flex;
        flex-direction: column;
        flex-basis: 60%; /* Set width for the right side (music score) */
    }

    .pdf-container {
        position: relative;
        width: 100%;
        height: calc(100vh - 40px); /* Adjust height based on header and padding */
        overflow: hidden;
    }


/* Responsive Styles (Optional) */
@media (max-width: 768px) {
    .music-container {
        flex-direction: column; /* Stack sections vertically on smaller screens */
    }

    .music-score {
        flex-basis: 100%; /* Full width for PDF on smaller screens */
    }
}


    .mb-8 {
        margin-bottom: 2rem;
    }

    .font-semibold {
        font-weight: 600;
    }

    .text-lg {
        font-size: 1.125rem;
    }

    .list-disc {
        list-style-type: disc;
    }

    .list-inside {
        padding-left: 1.5rem;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>
<!-- JavaScript/jQuery to handle tab switching -->
<script>
$(document).ready(function() {
    // Initial rendering based on active tab
    renderContent($('.tab-button.active').data('path'));

        // Handle tab button click
        $('.tab-button-mp3').click(function() {
        // Remove active class from all buttons
        $('.tab-button-mp3').removeClass('active');

        // Add active class to the clicked button
        $(this).addClass('active');

        // Get the path from the button's data attribute
        var path = $(this).data('path');

    });


    // Handle tab button click
    $('.tab-button').click(function() {
        // Remove active class from all buttons
        $('.tab-button').removeClass('active');

        // Add active class to the clicked button
        $(this).addClass('active');

        // Get the path from the button's data attribute
        var path = $(this).data('path');

        // Render content based on the clicked button's path
        renderContent(path);
    });

    // Function to render content (PDF or lyrics) based on path
    function renderContent(path) {
        if (path.toLowerCase().endsWith('.pdf')) {
            // Display PDF content
            renderPDF(path);
        } else {
            // Display lyrics content
            renderLyrics(path);
        }
    }

    // Function to render PDF content
    function renderPDF(pdfPath) {
        var canvas = document.getElementById('pdf-canvas');
        var context = canvas.getContext('2d');

        // Use PDF.js to render the PDF on the canvas
        pdfjsLib.getDocument(pdfPath).promise.then(function(pdf) {
            pdf.getPage(1).then(function(page) {
                var viewport = page.getViewport({ scale: 1.0 });
                canvas.width = viewport.width;
                canvas.height = viewport.height;

                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };

                page.render(renderContext);
            });
        });
    }

    // Function to render lyrics content
    function renderLyrics(lyricsPath) {
        // Replace the canvas content with lyrics content
        var canvas = document.getElementById('pdf-canvas');
        var context = canvas.getContext('2d');

        // Clear canvas
        context.clearRect(0, 0, canvas.width, canvas.height);

        // Display lyrics or other content based on the path
        context.fillStyle = '#000';
        context.font = '20px Arial';
        context.fillText('Lyrics content here', 10, 50); // Replace with actual lyrics
    }
});
</script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
