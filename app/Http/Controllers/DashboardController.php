<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChurchHymn;
use App\Models\MusicLyricist;
use App\Models\MusicComposer;
use App\Models\MusicArranger;
use App\Models\Category;
use App\Models\Instrumentation;
use App\Models\EnsembleType;
use App\Models\MusicCreator;
use App\Models\ActivityLog;
use App\Models\User;
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
        $totalLyricists = MusicLyricist::count();
        $totalComposers = MusicComposer::count();
        $totalArrangers = MusicArranger::count();
        
        $totalChurchHymns = ChurchHymn::withCount('musics')->get();
        $totalUsers = User::count(); // Assuming User is your model for users

        // Fetch recent activities
        //$recentActivities = ActivityLog::latest()->take(10)->get();

        // Fetch top 5 categories, instrumentations, ensemble types, and credits
        $categories = Category::take(5)->get();
        $instrumentations = Instrumentation::take(5)->get();
        $ensembleTypes = EnsembleType::take(5)->get();
        $credits = MusicCreator::take(5)->get();

        // Return the dashboard view with data
        return view('dashboard', [
            'totalChurchHymns' => $totalChurchHymns,
            'totalLyricists' => $totalLyricists,
            'totalComposers' => $totalComposers,
            'totalArrangers' => $totalArrangers,
            'totalUsers' => $totalUsers,
            'categories' => $categories,
            'instrumentations' => $instrumentations,
            'ensembleTypes' => $ensembleTypes,
            'credits' => $credits,
        ]);
    }
}
