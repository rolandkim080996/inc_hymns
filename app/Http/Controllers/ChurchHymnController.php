<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChurchHymn;
use App\Helpers\ActivityLogHelper;
use Illuminate\Support\Facades\Log;

class ChurchHymnController extends Controller
{
    // Display a listing of the church hymns
    public function index()
    {
        $hymns = ChurchHymn::all();
        return view('church_hymns.index', compact('hymns'));
    }

    // Show the form for creating a new church hymn
    public function create()
    {
        return view('church_hymns.create');
    }

    // Store a newly created church hymn in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

       $church_hymn =  ChurchHymn::create($validatedData);

        ActivityLogHelper::log('created', $church_hymn->name, $church_hymn->id, 'add new Church Hymn');

        return redirect()->route('church_hymns.index')->with('success', 'Church hymn created successfully!');
    }

    // Display the specified church hymn
    public function show(ChurchHymn $hymn)
    {
        return view('church_hymns.show', compact('hymn'));
    }

    // Show the form for editing the specified church hymn
    public function edit(ChurchHymn $hymn)
    {
        return view('church_hymns.edit', compact('hymn'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
            ]);
    
            $hymn = ChurchHymn::findOrFail($id);
            $hymn->update($validatedData);
    
            // Log activity
            ActivityLogHelper::log('updated', 'Church Hymn', $hymn->id, 'update Church Hymn');
    
            return redirect()->route('church_hymns.index')->with('success', 'Church hymn updated successfully!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to update Church hymn!');
        }
    }
    
    


    public function destroy($id)
    {
        try {
            $hymn = ChurchHymn::findOrFail($id);
            $hymn->delete();
    
            ActivityLogHelper::log('deleted', $hymn->name, $hymn->id, 'delete Church Hymn');
    
            return redirect()->route('church_hymns.index')->with('success', 'Church hymn deleted successfully!');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete Church hymn!');
        }
    }
    
}
