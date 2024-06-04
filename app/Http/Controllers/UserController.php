<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $groups = Group::all(); // Assuming you have a Group model
    
        return view('users.create', compact('groups'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'groups' => 'array', // Validate groups as an array
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
        // Attach groups to the user
        if ($request->has('groups')) {
            $user->groups()->attach($request->groups);
        }
    
        // return redirect()->route('users.index')->with('success', 'User created successfully.');
        return redirect()->route('groups.users', ['group' => $request->groups[0] ?? 1])->with('success', 'User created successfully.');
    }
    

    public function edit(User $user)
    {
        $groups = Group::all(); // Assuming you have a Group model
    
        return view('users.edit', compact('user', 'groups'));
    }
    

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'groups' => 'required|array',
            'groups.*' => 'exists:permission_groups,id',
        ]);
    
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
    
        $user->groups()->sync($request->groups);
    
       // return redirect()->route('users.index')->with('success', 'User updated successfully.');
        
        return redirect()->route('groups.users', ['group' => $request->groups[0] ?? 1])->with('success', 'User updated successfully.');
    }
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
