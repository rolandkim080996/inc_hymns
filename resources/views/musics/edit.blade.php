<!-- Include CSS file in your Blade view -->
<link href="{{ asset('css/dropdown.css') }}" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Music Management - Edit') }}
        </h2>
    </x-slot>

    <div class="py-10 mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                <!-- Edit Music Form -->
                <form method="POST" action="{{ route('musics.update', ['id' => $musics->id]) }}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="flex flex-wrap">
    <div class="w-full md:w-1/3 px-4">
        <!-- Church Hymn -->
        <div class="mb-4 mt-4">
            <label for="edit_church_hymn_id" class="block text-sm font-bold text-gray-700 mb-2">Church Hymn:</label>
            <select required id="edit_church_hymn_id" name="edit_church_hymn_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="" disabled selected>Select Church Hymn</option>
                @foreach($churchHymns as $churchHymn)
                    <option value="{{ $churchHymn->id }}">{{ $churchHymn->name }}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div class="w-full md:w-1/3 px-4">
        <!-- Title -->
        <div class="mb-4 mt-4">
            <label for="edit_title" class="block text-sm font-bold text-gray-700 mb-2">Title:</label>
            <input required type="text" id="edit_title" name="edit_title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>


    <div class="w-full md:w-1/3 px-4">
        <!-- Song Number -->
        <div class="mb-4 mt-4">
            <label for="edit_song_number" class="block text-sm font-bold text-gray-700 mb-2">Song Number:</label>
            <input required type="text" id="edit_song_number" name="edit_song_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
    </div>
</div>

                    <div class="flex flex-wrap">
                        <!-- File Inputs -->
                     
                            <!-- Left Column -->
                            <div class="w-full md:w-1/2 px-4">
                                
                            
                                <div class="mb-4">
                                    <label for="edit_vocals_mp3_path" class="block text-sm font-bold text-gray-700 mb-2">Vocals:</label>
                                    <input type="file" id="edit_vocals_mp3_path" name="edit_vocals_mp3_path" class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="audio/mpeg, audio/mp3">
                                </div>
                                <div class="mb-4">
                                    <label for="edit_organ_mp3_path" class="block text-sm font-bold text-gray-700 mb-2">Organ:</label>
                                    <input type="file" id="edit_organ_mp3_path" name="edit_organ_mp3_path" class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="audio/mpeg, audio/mp3">
                                </div>
                                <div class="mb-4">
                                    <label for="edit_preludes_mp3_path" class="block text-sm font-bold text-gray-700 mb-2">Preludes:</label>
                                    <input type="file" id="edit_preludes_mp3_path" name="edit_preludes_mp3_path" class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="audio/mpeg, audio/mp3">
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="w-full md:w-1/2 px-4">
                                <div class="mb-4">
                                    <label for="edit_music_score_path" class="block text-sm font-bold text-gray-700 mb-2">Music Score:</label>
                                    <input type="file" id="edit_music_score_path" name="edit_music_score_path" class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept=".pdf">
                                </div>
                                <div class="mb-4">
                                    <label for="edit_lyrics_path" class="block text-sm font-bold text-gray-700 mb-2">Lyrics:</label>
                                    <input type="file" id="edit_lyrics_path" name="edit_lyrics_path" class="mb-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept=".pdf">
                                </div>
                            </div>
                        </div>


                    <div class="flex flex-wrap">

<!-- Left Column -->
<div class="w-full md:w-1/2 px-4">

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="edit_category_id" class="block text-sm font-bold text-gray-700 mb-2">Category:</label>
                        <select id="edit_category_id" name="category_id"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Instrumentation-->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="edit_instrumentation_id" class="block text-sm font-bold text-gray-700 mb-2">Instrumentation:</label>
                            <select id="edit_instrumentation_id" name="instrumentation_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach($instrumentations as $instrumentation)
                                    <option value="{{ $instrumentation->id }}">{{ $instrumentation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Ensemble Type -->
                        <div>
                            <label for="edit_ensemble_type_id" class="block text-sm font-bold text-gray-700 mb-2">Ensemble Type:</label>
                            <select id="edit_ensemble_type_id" name="ensemble_type_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @foreach($ensembleTypes as $ensembleType)
                                    <option value="{{ $ensembleType->id }}">{{ $ensembleType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

 <!-- Lyricist Dropdown -->
 <div class="mb-4">
    <label for="edit_lyricist_id" class="block text-sm font-bold text-gray-700 mb-2">Lyricist:</label>
    <div class="combo-box">
        <div class="input-container" onclick="toggleDropdown('lyricist')">
            <div id="selected-lyricists" class="selected-items"><!-- Selected lyricists will appear here --></div>
            <input type="text" id="lyricist-input" placeholder="Select lyricists...">
            <div class="dropdown-arrow"></div>
        </div>
        <div id="lyricist-options-container" class="options-container">
            <!-- Lyricist options are populated by JavaScript -->
            @foreach($creators as $creator)
                <div class="option-item">
                    <label>
                        <input type="checkbox" value="{{ $creator->id }}" onclick="handleDropdownSelection(this, 'selected-lyricists')">
                        {{ $creator->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>


</div>

                    <!-- Right Column -->
<div class="w-full md:w-1/2 px-4">




<!-- Composer Dropdown -->
<div class="mb-4">
    <label for="edit_composer_id" class="block text-sm font-bold text-gray-700 mb-2">Composer:</label>
    <div class="combo-box">
        <div class="input-container" onclick="toggleDropdown('composer')">
            <div id="selected-composers" class="selected-items"><!-- Selected composers will appear here --></div>
            <input type="text" id="composer-input" placeholder="Select composers...">
            <div class="dropdown-arrow"></div>
        </div>
        <div id="composer-options-container" class="options-container">
            <!-- Composer options are populated by JavaScript -->
            @foreach($creators as $creator)
                <div class="option-item">
                    <label>
                        <input type="checkbox" value="{{ $creator->id }}" onclick="handleDropdownSelection(this, 'selected-composers')">
                        {{ $creator->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Arranger Dropdown -->
<div class="mb-4">
    <label for="edit_arranger_id" class="block text-sm font-bold text-gray-700 mb-2">Arranger:</label>
    <div class="combo-box">
        <div class="input-container" onclick="toggleDropdown('arranger')">
            <div id="selected-arrangers" class="selected-items"><!-- Selected arrangers will appear here --></div>
            <input type="text" id="arranger-input" placeholder="Select arrangers...">
            <div class="dropdown-arrow"></div>
        </div>
        <div id="arranger-options-container" class="options-container">
            <!-- Arranger options are populated by JavaScript -->
            @foreach($creators as $creator)
                <div class="option-item">
                    <label>
                        <input type="checkbox" value="{{ $creator->id }}" onclick="handleDropdownSelection(this, 'selected-arrangers')">
                        {{ $creator->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>


<!-- Language Dropdown -->
<div class="mb-4">
    <label for="edit_language_id" class="block text-sm font-bold text-gray-700 mb-2">Language:</label>
    <div class="combo-box">
        <div class="input-container" onclick="toggleDropdown('language')">
            <div id="selected-languages" class="selected-items"><!-- Selected languages will appear here --></div>
            <input type="text" id="language-input" placeholder="Select languages...">
            <div class="dropdown-arrow"></div>
        </div>
        <div id="language-options-container" class="options-container">
            <!-- Language options are populated by JavaScript -->
            @foreach($languages as $language)
                <div class="option-item">
                    <label>
                        <input type="checkbox" value="{{ $language->id }}" onclick="handleDropdownSelection(this, 'selected-languages')">
                        {{ $language->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>




</div>
</div>

                    <!-- Verses Used -->
                    <div class="mb-4">
                        <label for="edit_versesused" class="block text-sm font-bold text-gray-700 mb-2">Verses Used:</label>
                        <textarea id="edit_versesused" name="versesused" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>

                    <!-- Buttons to submit or close modal -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update
                        </button>
                        <button type="button" class="bg-gray-600 hover:bg-gray-800 text-black font-bold py-2 px-4 rounded ml-2 focus:outline-none focus:shadow-outline" onclick="closeAddMusicModal()">
                            Cancel
                        </button>
                    </div>

                    <script>
                        // Function to close the modal and redirect to the music page
                        function closeAddMusicModal() {
                            // Add your redirection logic here
                            window.location.href = '/musics'; // Replace '/music' with the URL of your music page
                        }
                    </script>
                </form>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>




<script>
  // Generic object to manage selected items
let selectedDropdownItems = {};

// Function to toggle dropdown visibility
function toggleDropdown(dropdownId) {
    let dropdownOptionsContainer = document.getElementById(`${dropdownId}-options-container`);
    dropdownOptionsContainer.classList.toggle("active");
}

// Function to handle item selection in a dropdown
function handleDropdownSelection(checkbox, selectedContainerId) {
    let selectedContainer = document.getElementById(selectedContainerId);

    // Check if the checkbox is checked
    if (checkbox.checked) {
        // Append the selected item to the selectedContainer
        appendSelectedItem(selectedContainer, checkbox);
    } else {
        // Remove the item from the selectedContainer
        removeSelectedItem(selectedContainer, checkbox);
    }
}

// Function to append a selected item to the selected items container
function appendSelectedItem(selectedContainer, checkbox) {
    let itemName = checkbox.parentNode.textContent.trim();

    let selectedItem = document.createElement("div");
    selectedItem.className = "selected-tag";
    selectedItem.textContent = itemName;

    let removeButton = document.createElement("span");
    removeButton.textContent = "×";
    removeButton.onclick = function () {
        // Uncheck the corresponding checkbox
        checkbox.checked = false;
        // Remove the selected item element
        selectedItem.remove();
    };

    selectedItem.appendChild(removeButton);
    selectedContainer.appendChild(selectedItem);
}

// Function to remove a selected item from the selected items container
function removeSelectedItem(selectedContainer, checkbox) {
    Array.from(selectedContainer.children).forEach((tag) => {
        // Get the text content of the selected item and remove unwanted characters
        let tagText = tag.textContent.trim().replace(/×/g, "");

        // Get the text content of the checkbox's parent node and remove unwanted characters
        let checkboxText = checkbox.parentNode.textContent.trim().replace(/×/g, "");

        // Check if the cleaned text content matches between the selected item and checkbox
        if (tagText === checkboxText) {
            // Remove the selected item element
            tag.remove();
        }
    });
}

// Function to filter options in a dropdown
function filterDropdownOptions(inputId, optionsContainerId) {
    const input = document.getElementById(inputId).value.trim().toUpperCase();
    const optionsContainer = document.getElementById(optionsContainerId);
    const optionItems = optionsContainer.querySelectorAll(".option-item");

    optionItems.forEach((item) => {
        const text = item.textContent.trim().toUpperCase();
        const checkbox = item.querySelector('input[type="checkbox"]');
        if (text.includes(input)) {
            item.style.display = "";
            if (checkbox) {
                checkbox.style.display = "inline-block";
            }
        } else {
            item.style.display = "none";
            if (checkbox) {
                checkbox.style.display = "none";
            }
        }
    });
}

// Attach event listeners for document click and input change
document.addEventListener("click", function (event) {
    // Hide dropdowns when clicking outside of the input containers and options containers
    const allComboBoxes = document.querySelectorAll(".combo-box");
    allComboBoxes.forEach((comboBox) => {
        const inputContainer = comboBox.querySelector(".input-container");
        const optionsContainer = comboBox.querySelector(".options-container");
        if (!inputContainer.contains(event.target) && !optionsContainer.contains(event.target)) {
            optionsContainer.classList.remove("active");
        }
    });
});

// Function to attach input event listeners for filtering options
function attachFilterListeners(inputId, optionsContainerId) {
    const inputElement = document.getElementById(inputId);
    inputElement.addEventListener("input", function () {
        filterDropdownOptions(inputId, optionsContainerId);
        toggleDropdown(inputId.replace("-input", "")); // Open dropdown if not already open
    });
}

// Initialize filter listeners for each dropdown
attachFilterListeners("language-input", "language-options-container");
attachFilterListeners("lyricist-input", "lyricist-options-container");
attachFilterListeners("composer-input", "composer-options-container");
attachFilterListeners("arranger-input", "arranger-options-container");

</script>