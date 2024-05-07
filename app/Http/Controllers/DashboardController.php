<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChurchHymn;
use App\Models\MusicLyricist;
use App\Models\MusicComposer;
use App\Models\MusicArranger;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch data for display on the dashboard
        //$totalChurchHymns = ChurchHymn::count();
        $totalLyricists = MusicLyricist::count();
        $totalComposers = MusicComposer::count();
        $totalArrangers = MusicArranger::count();

        
        // Inside your controller method
        $totalChurchHymns = ChurchHymn::withCount('musics')->get();

        // Return the dashboard view with data
        return view('dashboard', [
            'totalChurchHymns' => $totalChurchHymns,
            'totalLyricists' => $totalLyricists,
            'totalComposers' => $totalComposers,
            'totalArrangers' => $totalArrangers,
        ]);
    }
}
