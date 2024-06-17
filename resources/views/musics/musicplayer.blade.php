<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="{{ asset('css/musicplayer.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>
    <!-- Verify if the script path is correct and file exists -->
    <script>
        console.log("Loading musicplayer.js from: {{ asset('js/musicplayer.js') }}");
    </script>
    <script src="{{ asset('js/musicplayer.js') }}"></script>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music Player') }}
        </h2>
    </x-slot>

    <div class="py-10 mt-4">
        <div class="music-player">
            <!-- Tab buttons -->
            <div class="flex tab-buttons">
                <button class="tab-button-mp3 active" data-path="{{ asset('storage/' . $music->vocals_mp3_path) }}">Vocals</button>
                <button class="tab-button-mp3" data-path="{{ asset('storage/' . $music->organ_mp3_path) }}">Organ</button>
                <button class="tab-button-mp3" data-path="{{ asset('storage/' . $music->preludes_mp3_path) }}">Preludes</button>
                <button class="tab-button ml-2 active" data-path="{{ asset('storage/' . $music->music_score_path) }}">Music Score</button>
                <button class="tab-button" data-path="{{ asset('storage/' . $music->lyrics_path) }}">Lyrics Only</button>
            </div>
            
            <div class="progress-container" id="progressContainer">
                <div class="progress-bar" id="progressBar"></div>
            </div>
            <div class="time-display">
                <span id="currentTime">0:00</span>
                <span id="totalTime">0:00</span>
            </div>
            <div class="control-buttons">
                <button class="control-button" id="shuffleButton">🔀</button>
                <button class="control-button" id="prevButton">⏮️</button>
                <button class="control-button" id="playPauseButton">▶️</button>
                <button class="control-button" id="nextButton">⏭️</button>
                <button class="control-button" id="repeatButton">🔁</button>
            </div>
            <div class="volume-control">
                <span>🔊</span>
                <input
                    type="range"
                    id="volumeSlider"
                    class="volume-slider"
                    min="0"
                    max="1"
                    step="0.01"
                />
            </div>
        </div>
    </div>
</x-app-layout>

</body>
</html>
