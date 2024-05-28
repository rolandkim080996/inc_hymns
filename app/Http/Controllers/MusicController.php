<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use App\Models\ChurchHymn;
use App\Models\Category;
use App\Models\Instrumentation;
use App\Models\EnsembleType;
use App\Models\Language;
use App\Models\MusicCreator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MusicController extends Controller
{
// Display a listing of the music entries
public function index(Request $request)
    {
        // Get the query string from the request
        $query = $request->input('query');
        $categoryIds = $request->input('category_ids', []);

        // Initialize the query builder
        $queryBuilder = Music::query();

        // If a search query is provided, filter the records
        if ($query) {
            $queryBuilder->where('title', 'like', '%' . $query . '%')
                         ->orWhere('song_number', 'like', '%' . $query . '%')
                         ->orWhere('verses_used', 'like', '%' . $query . '%');
        }

        // Filter by selected categories
        if (!empty($categoryIds)) {
            $queryBuilder->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds);
            });
        }

        // Fetch all records if no search query is provided
        $musics = $queryBuilder->latest()->paginate(10)->withQueryString();

        // Fetch other data
        $churchHymns = ChurchHymn::all();
        $categories = Category::all();

        $categories = Category::select('categories.*')
        ->selectRaw('(SELECT COUNT(*) FROM musics INNER JOIN music_category ON musics.id = music_category.music_id WHERE music_category.category_id = categories.id) AS musics_count')
        ->orderBy('musics_count', 'desc')
        ->get();

        // Fetch top 10 categories with most musics
        $topCategories = Category::select('categories.*')
                                 ->selectRaw('(SELECT COUNT(*) FROM musics INNER JOIN music_category ON musics.id = music_category.music_id WHERE music_category.category_id = categories.id) AS musics_count')
                                 ->orderBy('musics_count', 'desc')
                                 ->limit(10)
                                 ->get();

        $instrumentations = Instrumentation::all();
        $ensembleTypes = EnsembleType::all();
        $languages = Language::all();
        $creators = MusicCreator::all();

        return view('musics', compact('musics', 'churchHymns', 'categories', 'topCategories', 'instrumentations', 'ensembleTypes', 'languages', 'creators'));
    }

    // Show the form for creating a new music entry
    public function create()
    {
        $churchHymns = ChurchHymn::all();
        $categories = Category::all();
        $instrumentations = Instrumentation::all();
        $ensembleTypes = EnsembleType::all();
        $languages = Language::all();
        $creators = MusicCreator::all();
        
        return view('musics.create', compact('churchHymns', 'categories', 'instrumentations', 'ensembleTypes', 'languages', 'creators'));
    }

    public function store(Request $request)
    {
        //dd($request);
        // Validate request data
        $validatedData = $request->validate([
            'church_hymn_id' => 'required|exists:church_hymns,id',
            'add_title' => 'required|max:255',
            'song_number' => 'nullable|numeric',
            'vocals_mp3_path' => 'file|mimes:mp3,audio/mpeg|max:50000',
            'organ_mp3_path' => 'nullable|file|mimes:mp3',
            'preludes_mp3_path' => 'nullable|file|mimes:mp3',
            'music_score_path' => 'nullable|file|mimes:pdf',
            'lyrics_path' => 'nullable|file|mimes:pdf',
            // 'organ_mp3_path' => 'nullable|file|mimes:mp3|max:50000', // Adjust max file size as needed
            // 'preludes_mp3_path' => 'nullable|file|mimes:mp3|max:50000', // Adjust max file size as needed
            // 'music_score_path' => 'nullable|file|mimes:pdf|max:10000', // Adjust max file size as needed
            // 'lyrics_path' => 'nullable|file|mimes:pdf|max:10000', // Adjust max file size as needed
            'category_id' => 'nullable|array',
            'instrumentation_id' => 'nullable|array',
            'ensembletype_id' => 'nullable|array',
            'lyricist_id' => 'nullable|array',
            'composer_id' => 'nullable|array',
            'arranger_id' => 'nullable|array',
            'language_id' => 'nullable|integer',
            'versesused' => 'nullable|string',
        ]);
       // dd($request);
        //Get authenticated user ID (assuming you're using authentication)
        $userId = Auth::id();
        //Process file uploads
        $filePaths = [];

        $filePaths['vocals_mp3_path'] = $this->storeFile($request, 'vocals_mp3_path');
        $filePaths['organ_mp3_path'] = $this->storeFile($request, 'organ_mp3_path');
        $filePaths['preludes_mp3_path'] = $this->storeFile($request, 'preludes_mp3_path');
        $filePaths['music_score_path'] = $this->storeFile($request, 'music_score_path');
        $filePaths['lyrics_path'] = $this->storeFile($request, 'lyrics_path');
       
        // Merge 'title' into validated data (if present)
        if ($request->has('add_title')) {
            $validatedData['title'] = $request->input('add_title');
            
        }

        // Get 'song_number' from the request
        $songNumber = $request->input('song_number');

        // Merge 'title', 'created_by', 'song_number' into validated data
        $validatedData = array_merge($validatedData, [
            'title' => $request->input('add_title'), // Add 'title' if present
            'created_by' => $userId,
            'updated_by' => $userId,
            'song_number' => $songNumber, // Add 'song_number'
            'verses_used' => $request->input('versesused'), // Add 'verses_used' from the request
        ], $filePaths); // Merge other file paths if any
        
       // dd($filePaths);
        // Create music entry
        $music = Music::create(array_merge($validatedData, $filePaths));
      

        // Attach related categories to the music model
        $categoryIds = $request->input('category_id', []);

        if (!empty($categoryIds)) {
            // Split the string into individual IDs and remove empty elements
            $categoryIds = array_filter(explode(',', reset($categoryIds)));

            if (!empty($categoryIds)) {
                $categoryIds = array_unique($categoryIds); // Remove duplicates
                $categories = Category::whereIn('id', $categoryIds)->get();

                foreach ($categories as $category) {
                    $music->categories()->attach($category->id);
                }
            }
        }

        $instrumentationIds = $request->input('instrumentation_id', []);

        if (!empty($instrumentationIds)) {
            // Split the string into individual IDs and remove empty elements
            $instrumentationIds = array_filter(explode(',', reset($instrumentationIds)));

            if (!empty($instrumentationIds)) {
                $instrumentationIds = array_unique($instrumentationIds); // Remove duplicates
                $instrumentations = Instrumentation::whereIn('id', $instrumentationIds)->get();

                foreach ($instrumentations as $instrumentation) {
                    $music->instrumentations()->attach($instrumentation->id);
                }
            }
        }

        $ensemble_typesIds = $request->input('ensembletype_id', []);

        if (!empty($ensemble_typesIds)) {
            // Split the string into individual IDs and remove empty elements
            $ensemble_typesIds = array_filter(explode(',', reset($ensemble_typesIds)));

            if (!empty($ensemble_typesIds)) {
                $ensemble_typesIds = array_unique($ensemble_typesIds); // Remove duplicates
                $ensemble_types = EnsembleType::whereIn('id', $ensemble_typesIds)->get();

                foreach ($ensemble_types as $ensemble_type) {
                    $music->ensembleTypes()->attach($ensemble_type->id);
                }
            }
        }
        

        // Attach related lyricists to the music model
        $lyricistIds = $request->input('lyricist_id', []);

        if (!empty($lyricistIds)) {
            // Split the string into individual IDs and remove empty elements
            $lyricistIds = array_filter(explode(',', reset($lyricistIds)));

            if (!empty($lyricistIds)) {
                $lyricistIds = array_unique($lyricistIds); // Remove duplicates
                $lyricists = MusicCreator::whereIn('id', $lyricistIds)->get();

                foreach ($lyricists as $lyricist) {
                    $music->lyricists()->attach($lyricist->id);
                }
            }
        }

        // Attach related composers to the music model
        $composerIds = $request->input('composer_id', []);

        if (!empty($composerIds)) {
            // Split the string into individual IDs and remove empty elements
            $composerIds = array_filter(explode(',', reset($composerIds)));

            if (!empty($composerIds)) {
                $composerIds = array_unique($composerIds); // Remove duplicates
                $composers = MusicCreator::whereIn('id', $composerIds)->get();

                foreach ($composers as $composer) {
                    $music->composers()->attach($composer->id);
                }
            }
        }

        // Attach related arrangers to the music model
        $arrangerIds = $request->input('arranger_id', []);

        if (!empty($arrangerIds)) {
            // Split the string into individual IDs and remove empty elements
            $arrangerIds = array_filter(explode(',', reset($arrangerIds)));

            if (!empty($arrangerIds)) {
                $arrangerIds = array_unique($arrangerIds); // Remove duplicates
                $arrangers = MusicCreator::whereIn('id', $arrangerIds)->get();

                foreach ($arrangers as $arranger) {
                    $music->arrangers()->attach($arranger->id);
                }
            }
        }
        // Redirect back to index page with success message
        return redirect()->route('musics.index')->with('success', 'Music entry created successfully!');
    }

    private function storeFile(Request $request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            // Ensure that the file was uploaded successfully
            if ($request->file($fieldName)->isValid()) {
                // Get the original name of the file
                $originalName = $request->file($fieldName)->getClientOriginalName();
                
                // Store the file with the original name in the 'music_files' directory
                return $request->file($fieldName)->storeAs('music_files', $originalName, 'public'); // 'public' disk
            } else {
                // Handle file upload failure
                throw new \Exception('Invalid file uploaded');
            }
        }
    
        return null; // No file uploaded
    }
    

    // Display the specified music entry
    public function show($id)
    {
        $music = Music::findOrFail($id); // Assuming Music is the model for your music records

        return view('musics.show', compact('music'));
    }

    // Show the form for editing the specified music entry
    public function edit($id)
    {
       
        $musics = Music::findOrFail($id);
       // dd($musics);
        $churchHymns = ChurchHymn::all();
        $categories = Category::all();
        $instrumentations = Instrumentation::all();
        $ensembleTypes = EnsembleType::all();
        $languages = Language::all();
        $creators = MusicCreator::all();

        return view('musics.edit', compact('musics', 'churchHymns', 'categories', 'instrumentations', 'ensembleTypes', 'languages', 'creators'));
    }

    public function update(Request $request, Music $music)
    {
 
    // Validate request data
    $validatedData = $request->validate([
        'edit_church_hymn_id' => 'required|exists:church_hymns,id',
        'edit_title' => 'required|max:255',
        'edit_song_number' => 'nullable|numeric',
        'edit_music_score_path' => 'nullable|string',
        'edit_lyrics_path' => 'nullable|string',
        'edit_vocals_mp3_path' => 'nullable|string',
        'edit_organ_mp3_path' => 'nullable|string',
        'edit_preludes_mp3_path' => 'nullable|string',
        'category_id' => 'nullable|array',
        'instrumentation_id' => 'nullable|array',
        'ensembletype_id' => 'nullable|array',
        'lyricist_id' => 'nullable|array',
        'composer_id' => 'nullable|array',
        'arranger_id' => 'nullable|array',
        'edit_language_id' => 'nullable|integer',
        'edit_versesused' => 'nullable|string',
    ]);

    // Process file uploads
    $filePaths = [];
   
    // Update file paths if new files are uploaded
    $filePaths['vocals_mp3_path'] = $this->storeFile($request, 'edit_vocals_mp3_path');
    $filePaths['organ_mp3_path'] = $this->storeFile($request, 'edit_organ_mp3_path');
    $filePaths['preludes_mp3_path'] = $this->storeFile($request, 'edit_preludes_mp3_path');
    $filePaths['music_score_path'] = $this->storeFile($request, 'edit_music_score_path');
    $filePaths['lyrics_path'] = $this->storeFile($request, 'edit_lyrics_path');
   
    // Merge file paths into validated data
    $validatedData = array_merge($validatedData, $filePaths);
 
    // Update music entry
    $music->update($validatedData);
    
    // Retrieve selected category IDs from the request
    $selectedCategoryIds = $request->input('category_id', []);
    

    // Retrieve selected instrumentation IDs from the request
    $instrumentationIds = $request->input('instrumentation_id', []);

    // Retrieve selected ensemble_type IDs from the request
    $ensemble_typeIds = $request->input('ensembletype_id', []);
    dd($ensemble_typeIds);
    // Get the existing category IDs associated with the music entry
    $existingCategoryIds = $music->categories()->pluck('id')->toArray();
   
    // Add new categories and detach categories that are not selected
    $categoriesToAdd = array_diff($selectedCategoryIds, $existingCategoryIds);
    $categoriesToDetach = array_diff($existingCategoryIds, $selectedCategoryIds);

    // Attach new categories
    $music->categories()->attach($categoriesToAdd);

    // Detach categories that are not selected
    $music->categories()->detach($categoriesToDetach);

    // Attach related instrumentations to the music model
    $music->instrumentations()->sync($request->input('edit_instrumentation_id', []));

    // Attach related ensemble types to the music model
    $music->ensembleTypes()->sync($request->input('edit_ensembletype_id', []));

    // Attach related lyricists to the music model
    $music->lyricists()->sync($request->input('edit_lyricist_id', []));

    // Attach related composers to the music model
    $music->composers()->sync($request->input('edit_composer_id', []));

    // Attach related arrangers to the music model
    $music->arrangers()->sync($request->input('edit_arranger_id', []));

    // Redirect back to index page with success message
    return redirect()->route('musics.index')->with('success', 'Music entry updated successfully!');
}


    // Delete the specified music entry from the database
    public function destroy(Music $music)
    {
        $music->delete();

        return redirect()->route('musics.index')->with('success', 'Music entry deleted successfully!');
    }
}
