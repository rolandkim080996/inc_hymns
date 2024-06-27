<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="{{ asset('css/musicplayer.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery before Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music Player') }}
        </h2>
    </x-slot>

    <div class="py-10 mb-4">
    <div class="music-player">
    <!-- Tab buttons -->
    <div class="tab-buttons">
        <button class="tab-button-mp3" data-path="{{ asset('storage/' . $music->vocals_mp3_path) }}">Vocals</button>
        <button class="tab-button-mp3" data-path="{{ asset('storage/' . $music->organ_mp3_path) }}">Organ</button>
        <button class="tab-button-mp3" data-path="{{ asset('storage/' . $music->preludes_mp3_path) }}">Preludes</button>
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
        <input type="range" id="volumeSlider" class="volume-slider" min="0" max="1" step="0.01" />
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.2.3/howler.min.js"></script>
<script>
    const tracks = {
        vocals: "{{ asset('storage/' . $music->vocals_mp3_path) }}",
        organ: "{{ asset('storage/' . $music->organ_mp3_path) }}",
        preludes: "{{ asset('storage/' . $music->preludes_mp3_path) }}"
    };

    let currentTrack = tracks.vocals;
    let sound = new Howl({
        src: [currentTrack],
        html5: true,
        onplay: () => {
            requestAnimationFrame(updateProgressBar);
        },
        onload: () => {
            totalTimeDisplay.textContent = formatTime(sound.duration());
        },
        onend: () => {
            if (repeat) {
                sound.play();
            } else {
                nextTrack();
            }
        },
    });

    let isPlaying = false;
    let isSeeking = false;
    const progressBar = document.getElementById("progressBar");
    const playPauseButton = document.getElementById("playPauseButton");
    const prevButton = document.getElementById("prevButton");
    const nextButton = document.getElementById("nextButton");
    const shuffleButton = document.getElementById("shuffleButton");
    const repeatButton = document.getElementById("repeatButton");
    const volumeSlider = document.getElementById("volumeSlider");
    const progressContainer = document.getElementById("progressContainer");
    const currentTimeDisplay = document.getElementById("currentTime");
    const totalTimeDisplay = document.getElementById("totalTime");
    const tabButtons = document.querySelectorAll(".tab-button-mp3");

    let shuffle = false;
    let repeat = false;

    playPauseButton.addEventListener("click", togglePlayPause);
    prevButton.addEventListener("click", prevTrack);
    nextButton.addEventListener("click", nextTrack);
    shuffleButton.addEventListener("click", toggleShuffle);
    repeatButton.addEventListener("click", toggleRepeat);
    volumeSlider.addEventListener("input", changeVolume);
    progressContainer.addEventListener("click", seekTrack);

    tabButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const track = button.getAttribute("data-path");
            switchTrack(track);
        });
    });

    function switchTrack(track) {
        const currentTime = sound.seek() || 0;
        sound.unload();
        sound = new Howl({
            src: [track],
            html5: true,
            onplay: () => {
                requestAnimationFrame(updateProgressBar);
            },
            onload: () => {
                sound.seek(currentTime);
                totalTimeDisplay.textContent = formatTime(sound.duration());
            },
            onend: () => {
                if (repeat) {
                    sound.play();
                } else {
                    nextTrack();
                }
            }
        });
        sound.play();
        playPauseButton.textContent = "⏸️";
        isPlaying = true;
    }

    function togglePlayPause() {
        if (isPlaying) {
            sound.pause();
            playPauseButton.textContent = "▶️";
        } else {
            sound.play();
            playPauseButton.textContent = "⏸️";
        }
        isPlaying = !isPlaying;
    }

    function prevTrack() {
        sound.seek(0);
    }

    function nextTrack() {
        sound.seek(sound.duration());
    }

    function toggleShuffle() {
        shuffle = !shuffle;
        shuffleButton.style.color = shuffle ? "#4caf50" : "white";
    }

    function toggleRepeat() {
        repeat = !repeat;
        repeatButton.style.color = repeat ? "#4caf50" : "white";
    }

    function changeVolume() {
        sound.volume(volumeSlider.value);
    }

    function updateProgressBar() {
        if (!isSeeking) {
            const seek = sound.seek() || 0;
            const progressPercent = (seek / sound.duration()) * 100;
            progressBar.style.width = `${progressPercent}%`;
            currentTimeDisplay.textContent = formatTime(seek);
        }

        if (sound.playing()) {
            requestAnimationFrame(updateProgressBar);
        }
    }

    function seekTrack(event) {
        const width = progressContainer.offsetWidth;
        const clickX = event.offsetX;
        const duration = sound.duration();
        const seek = (clickX / width) * duration;
        sound.seek(seek);
        isSeeking = false;
    }

    progressContainer.addEventListener("mousedown", () => {
        isSeeking = true;
    });

    progressContainer.addEventListener("mouseup", () => {
        isSeeking = false;
        updateProgressBar();
    });

    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? "0" : ""}${secs}`;
    }
</script>





    </div>
</x-app-layout>

</body>
</html>
