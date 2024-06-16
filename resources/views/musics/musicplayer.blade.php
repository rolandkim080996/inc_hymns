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
            <div class="music-player mt-6">
                <div class="file-upload">
                    <input type="file" id="fileInput" accept="audio/*">
                </div>
                <div class="progress-container" id="progressContainer">
                    <div class="progress-bar" id="progressBar"></div>
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
                    <input type="range" id="volumeSlider" class="volume-slider" min="0" max="1" step="0.01">
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>
