<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChurchHymn;
use App\Models\MusicLyricist;
use App\Models\MusicComposer;
use App\Models\MusicArranger;
use App\Models\Category;
use App\Models\MusicCategory; // Adjusted import
use App\Models\Instrumentation;
use App\Models\EnsembleType;
use App\Models\MusicCreator;
use App\Models\ActivityLog;
use App\Models\User;
use App\Models\Language;
use Illuminate\Support\Facades\DB;


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
        $categories = Category::paginate(10);

        $instrumentations = Instrumentation::paginate(5);
        $ensembleTypes = EnsembleType::paginate(5);
        $credits = MusicCreator::paginate(10);


        // Fetch counts of hymns per category with category names
        $categoryCounts = MusicCategory::selectRaw('music_category.*, categories.name as category_name, (select count(*) from musics where music_category.music_id = musics.id) as musics_count')
        ->join('categories', 'music_category.category_id', '=', 'categories.id')
        ->get();

        $logs = ActivityLog::with('user')->latest()->paginate(5);


        // Fetch counts of hymns per language
        $languageCounts = Language::withCount('musics')->get();
        
    // Fetch most viewed hymns with views count and song number
    $mostViewedHymns = ActivityLog::where('changes', 'view hymn')
        ->join('musics', 'activity_logs.model_id', '=', 'musics.id')
        ->select('musics.id', 'musics.title', 'musics.song_number', DB::raw('COUNT(activity_logs.id) as views_count'))
        ->groupBy('musics.id', 'musics.title', 'musics.song_number')
        ->orderByDesc('views_count')
        ->paginate(4);

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
            'categoryCounts' => $categoryCounts,
            'logs' => $logs,
            'languageCounts' => $languageCounts, // Pass language counts to the view
            'mostViewedHymns' => $mostViewedHymns, // Pass most viewed hymns to the view
        ]);
    }
}
