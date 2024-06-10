<?php
namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\User;
use App\Models\PermissionCategory;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::withCount('users')->get();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        // $permissions = [
        //     'Global' => [
        //         'superuser' => 'Super User',
        //         'admin' => 'Admin',
        //         'csv_import' => 'CSV Import',
        //         'dashboard' => 'Dashboard',
        //     ],
        //     'Musics' => [
        //         'musics.view' => 'View',
        //         'musics.create' => 'Create',
        //         'musics.edit' => 'Edit',
        //         'musics.delete' => 'Delete',
        //         'musics.view_hymn' => 'View Hymn',
        //         'musics.search' => 'Search',
        //     ],
        //     'Music Details' => [
        //         'music_details.viewdetails' => 'ViewDetails',
        //         'music_details.download' => 'Download',
        //         'music_details.play' => 'Play',
        //     ],
        //     'Categories' => [
        //         'categories.view' => 'View',
        //         'categories.create' => 'Create',
        //         'categories.edit' => 'Edit',
        //         'categories.delete' => 'Delete',
        //     ],
        //     'Instrumentations' => [
        //         'instrumentations.view' => 'View',
        //         'instrumentations.create' => 'Create',
        //         'instrumentations.edit' => 'Edit',
        //         'instrumentations.delete' => 'Delete',
        //     ],
        //     'Ensemble Types' => [
        //         'ensemble_types.view' => 'View',
        //         'ensemble_types.create' => 'Create',
        //         'ensemble_types.edit' => 'Edit',
        //         'ensemble_types.delete' => 'Delete',
        //     ],
        //     'Credits' => [
        //         'credits.view' => 'View',
        //         'credits.create' => 'Create',
        //         'credits.edit' => 'Edit',
        //         'credits.delete' => 'Delete',
        //     ],
        //     'Groups' => [
        //         'groups.view' => 'View',
        //         'groups.create' => 'Create',
        //         'groups.edit' => 'Edit',
        //         'groups.delete' => 'Delete',
        //     ],
        //     'Users' => [
        //         'users.view' => 'View',
        //         'users.create' => 'Create',
        //         'users.edit' => 'Edit',
        //         'users.delete' => 'Delete',
        //     ],
        //     'Navigation' => [
        //         'navigation.hymns' => 'Hymns',
        //         'navigation.createnew' => 'CreateNew',
        //         'navigation.settings' => 'Settings',
        //     ],
        // ];

        // Fetch categories and their permissions
        $permissions = \DB::table('permission_categories as pc')
            ->leftJoin('permission_categories as ppc', 'pc.id', '=', 'ppc.category_id')
            ->leftJoin('permissions as p', 'ppc.permission_id', '=', 'p.id')
            ->select('pc.name as category_name', 'p.name as permission_name', 'p.description as permission_description')
            ->orderBy('pc.id', 'asc')
            ->orderBy('p.id', 'asc')
            ->get();

        // Initialize the permissions array
        $permissionsArray = [];

        // Loop through the permissions and group them by category
        foreach ($permissions as $permission) {
            $categoryName = $permission->category_name ?: 'Global';
            // Skip adding null permission names
            if (!is_null($permission->permission_name)) {
                $permissionsArray[$categoryName][$permission->permission_name] = $permission->permission_description;
            }
        }

        return view('groups.create', compact('permissionsArray'));

    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'in:0,1', // each permission should be either '0' (deny) or '1' (grant)
        ]);

        $group = Group::create([
            'name' => $request->input('name'),
            // assuming Group model has a 'permissions' attribute that can store JSON
            'permissions' => json_encode($request->input('permissions', [])),
        ]);

        return redirect()->route('groups.index')->with('success', 'Group created successfully.');
    }

    public function edit(Group $group)
    {
        // Decode the JSON encoded permissions to an array for the view
        $group->permissions = json_decode($group->permissions, true);
        dd($group);
        // Fetch the available permissions from a source (this should be defined)
        $permissions = $this->getAvailablePermissions();

        return view('groups.edit', compact('group', 'permissions'));
    }

    private function getAvailablePermissions()
    {
        //Fetch categories and their permissions
        $permissions = \DB::table('permission_categories as pc')
            ->leftJoin('permission_categories as ppc', 'pc.id', '=', 'ppc.category_id')
            ->leftJoin('permissions as p', 'ppc.permission_id', '=', 'p.id')
            ->select('pc.name as category_name', 'p.name as permission_name', 'p.description as permission_description')
            ->orderBy('pc.id', 'asc')
            ->orderBy('p.id', 'asc')
            ->get();

        //Initialize the permissions array
        $permissionsArray = [];

        // Loop through the permissions and group them by category
        foreach ($permissions as $permission) {
            $categoryName = $permission->category_name ?: 'Global';
            $permissionsArray[$categoryName][$permission->permission_name] = $permission->permission_description;
        }

        return $permissionsArray;
    }



    // //Example method to fetch available permissions
    // private function getAvailablePermissions()
    // {
    //     //This should return the available permissions grouped by their category
    //     return [
    //         'Global' => [
    //             'superuser' => 'Super User',
    //             'admin' => 'Admin',
    //             'csv_import' => 'CSV Import',
    //             'dashboard' => 'Dashboard',
    //         ],
    //         'Musics' => [
    //             'musics.view' => 'View',
    //             'musics.create' => 'Create',
    //             'musics.edit' => 'Edit',
    //             'musics.delete' => 'Delete',
    //             'musics.view_hymn' => 'View Hymn',
    //             'musics.search' => 'Search',
    //         ],
    //         'Music Details' => [
    //             'music_details.viewdetails' => 'ViewDetails',
    //             'music_details.download' => 'Download',
    //             'music_details.play' => 'Play',
    //         ],
    //         'Categories' => [
    //             'categories.view' => 'View',
    //             'categories.create' => 'Create',
    //             'categories.edit' => 'Edit',
    //             'categories.delete' => 'Delete',
    //         ],
    //         'Instrumentations' => [
    //             'instrumentations.view' => 'View',
    //             'instrumentations.create' => 'Create',
    //             'instrumentations.edit' => 'Edit',
    //             'instrumentations.delete' => 'Delete',
    //         ],
    //         'Ensemble Types' => [
    //             'ensemble_types.view' => 'View',
    //             'ensemble_types.create' => 'Create',
    //             'ensemble_types.edit' => 'Edit',
    //             'ensemble_types.delete' => 'Delete',
    //         ],
    //         'Credits' => [
    //             'credits.view' => 'View',
    //             'credits.create' => 'Create',
    //             'credits.edit' => 'Edit',
    //             'credits.delete' => 'Delete',
    //         ],
    //         'Groups' => [
    //             'groups.view' => 'View',
    //             'groups.create' => 'Create',
    //             'groups.edit' => 'Edit',
    //             'groups.delete' => 'Delete',
    //         ],
    //         'Users' => [
    //             'users.view' => 'View',
    //             'users.create' => 'Create',
    //             'users.edit' => 'Edit',
    //             'users.delete' => 'Delete',
    //         ],
    //         'Navigation' => [
    //             'navigation.hymns' => 'Hymns',
    //             'navigation.createnew' => 'CreateNew',
    //             'navigation.settings' => 'Settings',
    //         ],
    //     ];
    // }

    public function update(Request $request, Group $group)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'nullable|array',
            'permissions.*' => 'in:0,1', // each permission should be either '0' (deny) or '1' (grant)
        ]);

        $group->update([
            'name' => $request->input('name'),
            'permissions' => json_encode($request->input('permissions', [])),
        ]);

        return redirect()->route('groups.index')->with('success', 'Group updated successfully.');
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
    }

    public function showUsers($id)
    {

        $group = Group::with('users')->findOrFail($id);
        $users = $group->users;
        return view('users.index', compact('group', 'users'));
    }

}
