<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MusicCreator;

class MusicCreatorController extends Controller
{
    // Display a listing of the music creators
    public function index()
    {
        $creators = MusicCreator::all();
        return view('creators.index', compact('creators'));
    }

    // Show the form for creating a new music creator
    public function create()
    {
        return view('creators.create');
    }

    // Store a newly created music creator in the database
    public function store(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'birthday' => 'nullable|date',
            'district' => 'nullable|string',
            'local' => 'nullable|string',
            'music_background' => 'nullable|string',
        ]);

        // Create new music creator
        MusicCreator::create($validatedData);

        return redirect()->route('creators.index')->with('success', 'Music creator created successfully!');
    }

    // Display the specified music creator
    public function show(MusicCreator $creator)
    {
        return view('creators.show', compact('creator'));
    }

    // Show the form for editing the specified music creator
    public function edit(MusicCreator $creator)
    {
        return view('creators.edit', compact('creator'));
    }

    // Update the specified music creator in the database
    public function update(Request $request, MusicCreator $creator)
    {
        // Validate request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'birthday' => 'nullable|date',
            'district' => 'nullable|string',
            'local' => 'nullable|string',
            'music_background' => 'nullable|string',
        ]);

        // Update the music creator
        $creator->update($validatedData);

        return redirect()->route('creators.index')->with('success', 'Music creator updated successfully!');
    }

    // Delete the specified music creator from the database
    public function destroy(MusicCreator $creator)
    {
        $creator->delete();

        return redirect()->route('creators.index')->with('success', 'Music creator deleted successfully!');
    }
}
